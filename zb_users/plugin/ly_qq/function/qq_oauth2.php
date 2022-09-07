<?php

/**
 * QQ API client for PHP
 * 
 * @author PiscDong (http://www.piscdong.com/) 
 */
class ly_qq_oauth2
{
    public $api_url = 'https://graph.qq.com/';
    public $state = '';
    public function __construct($appid, $appkey, $access_token = null)
    {
        $this->appid = $appid;
        $this->appkey = $appkey;
        $this->access_token = $access_token;
    }
    // 生成授权网址
    public function login_url($callback_url, $scope = '')
    {
        $params = array(
            'client_id' => $this->appid,
            'redirect_uri' => $callback_url,
            'response_type' => 'code',
            'state' => $this->state,
            'scope' => $scope
        );
        return 'https://graph.qq.com/oauth2.0/authorize?' . http_build_query($params);
    }
    // 获取access token
    public function access_token($callback_url, $code)
    {
        $params = array(
            'grant_type' => 'authorization_code',
            'client_id' => $this->appid,
            'client_secret' => $this->appkey,
            'code' => $code,
            'state' => $this->state,
            'redirect_uri' => $callback_url
        );
        $url = 'https://graph.qq.com/oauth2.0/token?' . http_build_query($params);
        $result_str = $this->http($url);
        $json_r = array();
        if ($result_str != '') parse_str($result_str, $json_r);
        return $json_r;
    }

    // 获取登录用户的openid
    public function get_openid($unionid='')
    {
        $params = array(
            'access_token' => $this->access_token
        );
        $url = 'https://graph.qq.com/oauth2.0/me?' . http_build_query($params) . '&unionid=' . $unionid;
        $result_str = $this->http($url);
        $json_r = array();
        if ($result_str != '') {
            preg_match('/callback\(\s+(.*?)\s+\)/i', $result_str, $result_a);
            $json_r = json_decode($result_a[1], true);
        }
        return $json_r;
    }
    // 根据openid获取用户信息
    public function get_user_info($openid)
    {
        $params = array(
            'openid' => $openid
        );
        return $this->api('user/get_user_info', $params);
    }
    // 发布分享
    public function add_share($openid, $title, $url, $site, $fromurl, $images = '', $summary = '')
    {
        $params = array(
            'openid' => $openid,
            'title' => $title,
            'url' => $url,
            'site' => $site,
            'fromurl' => $fromurl,
            'images' => $images,
            'summary' => $summary
        );
        return $this->api('share/add_share', $params, 'POST');
    }
    // 调用接口
    /**
     * //示例：根据openid获取用户信息
     * $result=$qq->api('user/get_user_info', array('openid'=>$openid), 'GET');
     */
    public function api($url, $params = array(), $method = 'GET')
    {
        $url = $this->api_url . $url;
        $params['access_token'] = $this->access_token;
        $params['oauth_consumer_key'] = $this->appid;
        $params['format'] = 'json';
        if ($method == 'GET') {
            $result_str = $this->http($url . '?' . http_build_query($params));
        } else {
            $result_str = $this->http($url, http_build_query($params), 'POST');
        }
        $result = array();
        if ($result_str != '') $result = json_decode($result_str, true);
        return $result;
    }
    // 提交请求
    private function http($url, $postfields = '', $method = 'GET', $headers = array())
    {
        $ajax = Network::Create();
        if ($method == 'POST' && $postfields != '') {
            $ajax->open('POST', $url);
            $ajax->send($postfields);
        } else {
            $ajax->open('GET', $url);
            $ajax->send();
        }
        return $ajax->responseText;
    }
}
