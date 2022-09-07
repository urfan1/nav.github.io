<?php
require $GLOBALS['usersdir'] . 'plugin/ly_qq/function/db.php';
require $GLOBALS['usersdir'] . 'plugin/ly_qq/function/ly_qq_core.php';
require $GLOBALS['usersdir'] . 'plugin/ly_qq/function/qq_oauth2.php';
#注册插件
RegisterPlugin('ly_qq', 'ActivePlugin_ly_qq');

function ActivePlugin_ly_qq()
{
	ly_qq_core::database();
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'ly_qq_TopMenu');
	Add_Filter_Plugin('Filter_Plugin_Index_End', 'ly_qq_currenturl');
	Add_Filter_Plugin('Filter_Plugin_Html_Js_Add', 'ly_qq_PostLink');
	Add_Filter_Plugin('Filter_Plugin_Login_Header', 'ly_qq_LoginLink');
	Add_Filter_Plugin('Filter_Plugin_Member_Avatar', 'ly_qq_UserAvatar');
	Add_Filter_Plugin('Filter_Plugin_DelMember_Succeed', 'ly_qq_DelMember');
	Add_Filter_Plugin('Filter_Plugin_PostComment_Core', 'ly_qq_PostComment');
	Add_Filter_Plugin('Filter_Plugin_Admin_MemberMng_Table', 'ly_qq_MemberMng');
}

function InstallPlugin_ly_qq()
{
	ly_qq_core::Install();
}

function UninstallPlugin_ly_qq()
{
}
//登录页插入QQ登录链接

function ly_qq_LoginLink()
{
	ly_qq_core::LoginLink();
}

//文章页面插入QQ登录链接

function ly_qq_PostLink()
{
	ly_qq_core::PostLink();
}
//删除用户同时删除QQ绑定信息

function ly_qq_DelMember($mem)
{
	ly_qq_core::DelMember($mem);
}
//限制登录后评论

function ly_qq_PostComment()
{
	ly_qq_core::PostComment();
}
//记录登录前URL，登录后返回原来URL

function ly_qq_currenturl()
{
	ly_qq_core::currenturl();
}
//后台菜单增加绑定QQ链接

function ly_qq_TopMenu(&$m)
{
	ly_qq_core::TopMenu($m);
}

//调用QQ登录头像

function ly_qq_UserAvatar(&$member)
{
	return ly_qq_core::Avatar($member);
}
//用户管理列表显示头像

function ly_qq_MemberMng(&$member, &$tabletds, &$tableths)
{
	return ly_qq_core::MemberMng($member, $tabletds, $tableths);
}
//直调插件参数

function ly_qq_Config($a = '', $v = '')
{
	if ($a) {
		global $zbp;
		return $zbp->Config('ly_qq')->HasKey($a) && $zbp->Config('ly_qq')->$a ? $zbp->Config('ly_qq')->$a : $v;
	}
}
