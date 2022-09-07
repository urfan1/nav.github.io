<?php
class ly_qq_core
{
	static function Install()
	{
		global $zbp;
		//建表保存QQ登录openid
		if (!$zbp->db->ExistTable($GLOBALS['table']['ly_qq'])) {
			$s = $zbp->db->sql->CreateTable($GLOBALS['table']['ly_qq'], $GLOBALS['datainfo']['ly_qq']);
			$zbp->db->QueryMulit($s);
			//更改mem_Name编码为utf8mb4_general_ci防止用户名表情符号插入数据失败
			$a = $zbp->db->Query('SHOW FULL COLUMNS FROM `' . $zbp->db->dbpre . 'member`');
			foreach ($a as $r) {
				if ($r['Field'] == 'mem_Name' && $r['Collation'] != 'utf8mb4_general_ci') {
					$zbp->db->Query("ALTER TABLE `" . $zbp->db->dbpre . "member` CHANGE COLUMN `mem_Name` `mem_Name` VARCHAR(250) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci' AFTER `mem_Status`");
				}
			}
		}
	}
	static function Update($is = 0)
	{
		global $zbp;
		//更新增加unionid字段
		if (!$zbp->Config('ly_qq')->HasKey('unionid')) {
			if ($is) {
				$zbp->Config('ly_qq')->unionid = '';
				$zbp->SaveConfig('ly_qq');
			}
			$unionid = 1;
			$a = $zbp->db->Query('SHOW FULL COLUMNS FROM `' . $zbp->db->dbpre . 'ly_qq`');
			foreach ($a as $r) {
				if ($r['Field'] == 'openid' && !$r['Key']) {
					$zbp->db->Query('ALTER TABLE `' . $zbp->db->dbpre . 'ly_qq` ADD INDEX `openid` (`openid`)');
				}
				if ($r['Field'] == 'unionid') {
					$unionid = 0;
					if (!$r['Key']) {
						$zbp->db->Query('ALTER TABLE `' . $zbp->db->dbpre . 'ly_qq` ADD INDEX `unionid` (`unionid`)');
					}
				}
			}
			if ($unionid) {
				$zbp->db->Query('ALTER TABLE `' . $zbp->db->dbpre . 'ly_qq` ADD COLUMN `unionid` VARCHAR(50) NOT NULL DEFAULT "" AFTER `openid`, ADD INDEX `unionid` (`unionid`)');
			}
		}
	}
	//新表序列
	static function database()
	{
		$database = array(
			'ly_qq' => array(
				'table' => '%pre%ly_qq',
				'datainfo' => array(
					'ID' => array('ID', 'integer', '', 0),
					'Uid' => array('uid', 'integer', '', 0),
					'Openid' => array('openid', 'string', 50, ''),
					'Unionid' => array('unionid', 'string', 50, '')
				)
			)
		);
		foreach ($database as $key => $v) {
			$GLOBALS['table'][$key] = $v['table'];
			$GLOBALS['datainfo'][$key] = $v['datainfo'];
		}
	}
	static function encrypt($d = array())
	{
		$key = ly_qq_Config('appkey');
		$d['time'] = time();
		$s = json_encode($d);
		$s = openssl_encrypt($s, "aes-256-cbc", $key, 0, substr(md5($key), 0, 16)); //php5.4
		return urlencode(base64_encode($s));
	}
	static function decrypt($d)
	{
		$key = ly_qq_Config('appkey');
		$s = base64_decode(urldecode(trim($d)));
		$s = openssl_decrypt($s, "aes-256-cbc", $key, 0, substr(md5($key), 0, 16));
		$d = json_decode($s, true);
		if (!empty($d['time']) && (time() - intval($d['time'])) < 300) {
			return $d;
		}
	}
	//回调地址
	static function Redirect_Uri($uri = '')
	{
		global $zbp;
		return $zbp->host . 'zb_users/plugin/ly_qq/qq.php' . $uri;
	}
	//QQ互联授权回调处理
	static function Authorize()
	{
		global $zbp;
		$qq = new ly_qq_oauth2(ly_qq_Config('appid'), ly_qq_Config('appkey'));
		$qq->state = self::Authorize2();
		$url = self::Redirect_Uri();
		if (GetVars('code')) {
			$result = $qq->access_token($url, GetVars('code'));
			if (!empty($result['access_token'])) {
				$url = self::currenturl(1);
				$qq->access_token = $result['access_token'];
				$qq_oid = $qq->get_openid(ly_qq_Config('unionid'));
				if (!empty($qq_oid['openid'])) {
					$d = $qq->get_user_info($qq_oid['openid']);
					if (!empty($d['nickname'])) {
						$d = array_merge($qq_oid, $d);
						if (GetVars('state')) {
							$e = self::decrypt(GetVars('state'));
							if (!empty($e['uri'])) {
								$url = $e['uri'] . '?ly_qq_data=' . self::encrypt($d);
							}
						} else {
							self::UserData($d);
						}
					}
				}
			}
		} else {
			$url = $qq->login_url($url, 'get_user_info');
		}
		die('<script>location.href="' . $url . '";</script>');
	}
	//QQ互联授权回调验证
	static function Authorize2()
	{
		$url = '';
		if (GetVars('ly_qq_Authorize2')) {
			return GetVars('ly_qq_Authorize2');
		}
		if (GetVars('ly_qq_data')) {
			$d = self::decrypt(GetVars('ly_qq_data'));
			if (!empty($d['openid'])) {
				self::UserData($d);
				$url = self::currenturl(1);
			} else {
				$url = '/';
			}
		} elseif (preg_match('#^https?://.*?/plugin/ly_qq/qq.php$#', ly_qq_Config('appid'))) {
			$d = array('uri' => self::Redirect_Uri());
			$url = ly_qq_Config('appid') . '?ly_qq_Authorize2=' . self::encrypt($d);
		}
		if ($url) {
			die('<script>location.href="' . $url . '";</script>');
		}
	}
	//登录回调，注册用户或者与用户绑定openid
	static function UserData($d = array())
	{
		global $zbp;
		$openid = $d['openid'];
		$unionid = !empty($d['unionid']) ? $d['unionid'] : '';
		$nickname = addslashes($d['nickname']);
		$avatar = $d['figureurl_qq_2'];
		self::Update(1);
		$tb = new ly_qq();
		$mem = new Member();
		$avatar = preg_replace('#https?://#', '//', $avatar);
		if ($zbp->user->ID) { //已登录用户
			$mem = $zbp->user;
		}
		$a = array(array('openid', $openid));
		if ($unionid) {
			$a[] = array('unionid', $unionid);
		}
		$sql = $zbp->db->sql->Select($zbp->table['ly_qq'], array('*'), array('array', $a));
		$r = $zbp->GetListType('ly_qq', $sql);
		if (!empty($r[0])) {
			$tb = $r[0];
			if (!$mem->ID) { //已有openid绑定
				$mem = $zbp->GetMemberByID($tb->Uid);
			}
		}
		//临时授权
		$GLOBALS['actions']['MemberNew'] = 6;
		$GLOBALS['actions']['MemberEdt'] = 6;
		$GLOBALS['actions']['MemberPst'] = 6;
		$GLOBALS['actions']['MemberAll'] = 6;
		$_POST = array();
		$d = array('ID', 'Level', 'Status', 'Name', 'Email', 'HomePage', 'Intro', 'Template');
		foreach ($d as $r) {
			$_POST[$r] = $mem->$r;
		}
		if ($mem->ID) {
			$_POST["Password"] = '';
			$_POST["PasswordRe"] = '';
		} else {
			//新用户默认随机密码
			$pw = substr(md5($openid . GetGuid() . time()), 0, 12);
			$s = $zbp->db->sql->Count($zbp->table['Member'], array(array('COUNT', '*', 'num')), array(array('=', 'mem_Name', $nickname)));
			$num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');
			if ($num > 0) {
				$nickname .= '_x' . $num;
			}
			$_POST["Name"] = $nickname;
			$_POST["Alias"] = $nickname;
			$_POST["Level"] = ly_qq_Config('level', 6);
			$_POST["Password"] = $pw;
			$_POST["PasswordRe"] = $pw;
		}
		$_POST["meta_ly_qq"] = 1;
		$_POST["meta_ly_qq_avatar"] = $avatar;
		$_POST["IP"] = GetGuestIP();
		$mem = PostMember();
		if ($mem->ID) {
			if ($tb->Uid != $mem->ID || $openid != $tb->Openid || $unionid && $unionid != $tb->Unionid) {
				$tb->Uid = $mem->ID;
				$tb->Openid = $openid;
				$tb->Unionid = $unionid;
				$tb->Save();
			}
			$zbp->user = $mem;
			$zbp->islogin = true;
			$sdt = (time() + 3600 * 24 * 30);
			SetLoginCookie($mem, (int) $sdt);
		}
	}
	//登录页插入QQ登录链接
	static function LoginLink()
	{
		$val = '<a href="' . ly_qq_core::Redirect_Uri() . '" style="float:left;color:#fff;margin:0;padding:5px 10px 6px 10px;background:#07c160;">QQ登录</a>';
?><script>
			$(function() {
				var val = '<?php echo $val; ?>';
				$("form").each(function() {
					if ($(this).find("input[type='password']").length > 0) {
						if ($(this).find('.submit').length > 0) {
							return $(this).find('.submit').prepend(val);
						} else {
							return $(this).append(val);
						}
					}
				});
			});
		</script>
<?php
	}
	//文章页面插入QQ登录链接
	static function PostLink()
	{
		if (ly_qq_Config('add') && empty($_COOKIE['addinfo'])) {
			$val = '<div style="float:left;width:100%;margin:20px auto;font-size:2.0rem;text-align:center;overflow:hidden;display:block;">';
			$val .= '<a href="' . ly_qq_core::Redirect_Uri() . '" target="_blank" style="color:#fff;margin:20px auto;padding:10px 20px;background:#07c160;overflow:hidden;display:block;">QQ登录</a>';
			$val .= '</div>';
			echo '
			$(function(){
				$("form").each(function(){
					if($(this).find("textarea").length>0){
						$(this).attr("action","");
						return $(this).html(\'' . $val . '\');
					}
				});
			});';
		}
	}
	//删除用户同时删除QQ绑定信息
	static function DelMember($mem)
	{
		global $zbp;
		$sql = $zbp->db->sql->Select($zbp->table['ly_qq'], array('*'), array(array('=', 'uid', '' . $mem->ID . '')));
		$tb = $zbp->GetListType('ly_qq', $sql);
		if (!empty($tb[0])) {
			$tb[0]->Del();
		}
	}
	//限制登录后评论
	static function PostComment()
	{
		global $zbp;
		if (ly_qq_Config('add') && !$zbp->user->ID) {
			$zbp->ShowError(6, __FILE__, __LINE__);
		}
	}
	//记录登录前URL，登录后返回原来URL
	static function currenturl($v = 0)
	{
		if ($v) {
			return GetVars('ly_qq_currenturl', 'COOKIE') ? urldecode(GetVars('ly_qq_currenturl', 'COOKIE')) : '/';
		} else {
			global $zbp;
			if (!$zbp->user->ID && $zbp->fullcurrenturl) {
				setcookie('ly_qq_currenturl', urlencode($zbp->fullcurrenturl), time() + 6000, '/', '', false, true);
			}
		}
	}
	//后台菜单增加绑定QQ链接
	static function TopMenu(&$m)
	{
		global $zbp;
		if (!$zbp->user->Metas->HasKey('ly_qq') && ly_qq_Config('appid')) {
			array_unshift($m, MakeTopMenu("login", ' 绑定QQ', ly_qq_core::Redirect_Uri(), '', 'ly_qq_TopMenu'));
		}
	}
	//调用QQ登录头像
	static function Avatar(&$member)
	{
		if ($member->Metas->HasKey('ly_qq_avatar')) {
			return $member->Metas->ly_qq_avatar;
		} else {
			global $zbp;
			return $zbp->host . 'zb_users/avatar/0.png';
		}
	}
	//用户管理列表显示头像
	static function MemberMng(&$member, &$tabletds, &$tableths)
	{
		global $zbp;
		$th = '<th>' . $zbp->lang['msg']['default_avatar'] . '</th>';
		$td = '<td class="td10"><img src="' . self::Avatar($member) . '" style="width:40px;height:40px;" /></td>';
		if (array_search($th, $tableths) == false) {
			array_splice($tableths, 3, 0, $th);
		}
		array_splice($tabletds, 3, 0, $td);
	}
}
