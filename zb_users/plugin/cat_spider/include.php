<?php
#注册插件
RegisterPlugin("cat_spider","ActivePlugin_cat_spider");

function ActivePlugin_cat_spider() {
	Add_Filter_Plugin('Filter_Plugin_Index_Begin','cat_spider_login');
	Add_Filter_Plugin('Filter_Plugin_Search_Begin', 'cat_spider_login');
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','cat_spider_AddMenu');
}

function InstallPlugin_cat_spider() {
	global $zbp;
	$array = array(
	    'google' => '0',
        'baidu' => '1',
        'haosou' => '1',
        'biying' => '0',
        'sogou' => '1',
        'youdao' => '0',
        'shenma' => '1',
        'toutiao' => '1',
        'other' => '0',
        'xieon' => '0'
    );
	if (!$zbp->HasConfig('cat_spider')) {
        foreach ($array as $value => $k) {
            $zbp->Config('cat_spider')->$value = $k;
        }
        $zbp->SaveConfig('cat_spider');
    }
	cat_spider_createtable();
}

$table['cat_spider'] = '%pre%cat_spider';
$datainfo['cat_spider'] = array(
    'ID' => array('id', 'integer', '', 0),
    'Name' => array('name', 'string', 128, ''),
    'Ip' => array('ip', 'string', 128, ''),
    'Url' => array('url', 'string', 128, ''),
    'Status' => array('status', 'string', 128, ''),
    'Stime' => array('stime', 'integer', '', 0)
);
$spider = array( 'baidu','google','haosou','sogou','biying','youdao','shenma','toutiao','other','xieon' );

function cat_spider_createtable(){
    global $zbp;
    if (!$zbp->db->ExistTable($GLOBALS['table']['cat_spider'])) {
        $s = $zbp->db->sql->CreateTable($GLOBALS['table']['cat_spider'], $GLOBALS['datainfo']['cat_spider']);
        $zbp->db->QueryMulit($s);
    }
}

function cat_spider_AddMenu(&$m){
    global $zbp;
    array_unshift($m, MakeTopMenu("root",'蜘蛛数据',$zbp->host . "zb_users/plugin/cat_spider/main.php?act=xi","","topmenu_cat_spider","icon-bug-fill"));
}

function cat_spider_get_current_url()
{
    global $zbp,$currentCityAlias;

    try {
        if (empty($currentCityAlias)) {
            return rtrim(str_replace('app-city-path',$currentCityAlias,$zbp->currenturl),'/');
        }
        return str_replace('app-city-path',$currentCityAlias,$zbp->currenturl);
    } catch (Exception $e) {
        return  $zbp->currenturl;
    }
}

function cat_spider_login(){
    global $zbp;
    if(isset($_SERVER['HTTP_USER_AGENT'])){
        $useragent = addslashes(strtolower($_SERVER['HTTP_USER_AGENT']));
        if (strpos($useragent, 'googlebot')!== false){
            if($zbp->Config('cat_spider')->google == '1'){$bot = 'google';}
        } elseif (strpos($useragent,'baiduspider') !== false){
            if($zbp->Config('cat_spider')->baidu == '1'){$bot = 'baidu';}
        } elseif (strpos($useragent,'sogou') !== false){
            if($zbp->Config('cat_spider')->sogou == '1'){$bot = 'sogou';}
        } elseif (strpos($useragent,'bingbot') !== false){
            if($zbp->Config('cat_spider')->biying == '1'){$bot = 'biying';}
        } elseif (strpos($useragent,'360spider') !== false){
            if($zbp->Config('cat_spider')->haosou == '1'){$bot = 'haosou';}
        } elseif (strpos($useragent,'youdao') !== false){
            if($zbp->Config('cat_spider')->youdao == '1'){$bot = 'youdao';}
        } elseif (strpos($useragent,'bytespider') !== false){
            if($zbp->Config('cat_spider')->toutiao == '1'){$bot = 'toutiao';}
        } elseif (strpos($useragent,'yisouspider') !== false){
            if($zbp->Config('cat_spider')->shenma == '1'){$bot = 'shenma';}
        } elseif (strpos($useragent,'bot') !== false){
            if($zbp->Config('cat_spider')->other == '1'){$bot = 'other';}
        }
        if(isset($bot)){
            // $wurl = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST']  . $zbp->currenturl : '';
            $wurl = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST']  . cat_spider_get_current_url() : '';
            if(isset($_SERVER['REQUEST_SCHEME'])){
                $http = $_SERVER['REQUEST_SCHEME'].'://';
            } else {
                $http = 'http://';
                if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                    $http = 'https://';
                }
            }
            $url = $http.$wurl;
            $ip = GetGuestIP();
            stream_context_set_default([
                'ssl' => [
                    'verify_host' => false,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    ],
            ]);
            $status = get_headers($url);
            $statusCode = substr($status[0], 9, 3);
            cat_spider_add($bot,$url,$ip,$statusCode);
        }
	}
}

function cat_spider_post_shan(){
    global $zbp,$spider,$datainfo;
    $new = [];
    foreach ($spider as $k=>$v) {
        if($zbp->Config('cat_spider')->$v == '1'){
            $new[] = $spider[$k];
        }
    }
    $arr = [];
    foreach ($new as $k=>$v){
        $sql = $zbp->db->sql->Select($zbp->table['cat_spider'], null, array('=', 'name', $v), null, null, null);
        $array = $zbp->GetListCustom($zbp->table['cat_spider'],$datainfo['cat_spider'],$sql);
        $arr[$k]['name'] = cat_spider_Qiepin($v);
        $arr[$k]['num'] = count($array);
    }
    return $arr;
}

function cat_spider_post_shu(){
    global $zbp,$spider,$datainfo;
    $new = [];
    foreach ($spider as $k=>$v) {
        if($zbp->Config('cat_spider')->$v == '1'){
            $new[] = $spider[$k];
        }
    }
    $num = [];
    $zhuan = [];
    foreach ($new as $v){
        $sql = $zbp->db->sql->Select($zbp->table['cat_spider'], null, array(array('=', 'name', $v), array('>', 'stime', strtotime(date("Y-m-d"),time()))), null, null, null);
        $array = $zbp->GetListCustom($zbp->table['cat_spider'],$datainfo['cat_spider'],$sql);
        $num[] = count($array);
        $zhuan[] = cat_spider_Qiepin($v);
    }
    return array(json_encode($zhuan),json_encode($num));
}

function cat_spider_Qiepin($str){
    switch ($str) {
        case 'google':
            return '谷歌';
            break;
        case 'baidu':
            return '百度';
            break;
        case 'sogou':
            return '搜狗';
            break;
        case 'biying':
            return '必应';
            break;
        case 'haosou':
            return '360搜索';
            break;
        case 'youdao':
            return '有道';
            break;
        case 'toutiao':
            return '头条';
            break;
        case 'shenma':
            return '神马';
            break;
        case 'other':
            return '其他';
            break;
        default:
        // code...
            break;
    }
}

function cat_spider_QieMenu($id){
    $SubMenu = array(
        0 => array('数据统计', 'xi', false),
        1 => array('日志', 'list', false),
		2 => array('设置', 'option', false)
    );
    foreach ($SubMenu as $k => $v) {
        echo '<li><a class="' . ($id == $v[1] ? 'on' : '') . '" href="?act=' . $v[1] . '"><span class="m-left ' . ($id == $v[1] ? 'layui-this' : '') . '">' . $v[0] . '</span></a></li>';
    }
}

function cat_spider_save_config($str){
	global $zbp,$spider;
	$new = [];
	foreach ($spider as $val) {
		if(empty($str[$val])){
			$new[$val] = 0;
		} else {
			$new[$val] = $str[$val];
		}
		$zbp->Config('cat_spider')->$val = trim($new[$val]);
	}
	$zbp->SaveConfig('cat_spider');
}

function cat_spider_add($bot,$url,$ip,$status){
	global $zbp;
	$str = array('name'=>$bot,'url'=>$url,'ip'=>$ip,'status'=>$status,'stime'=>time());
	$zbp->db->sql->get()->insert($zbp->db->dbpre.'cat_spider')->data($str)->query;
}

function UninstallPlugin_cat_spider() {
	global $zbp;
	if($zbp->Config('cat_spider')->xieon == '1'){
        $zbp->DelConfig('cat_spider');
	    $zbp->db->sql->get()->drop()->table($zbp->db->dbpre.'cat_spider')->ifexists()->query;
	}
}