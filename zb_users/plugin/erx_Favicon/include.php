<?php
#注册插件
#Favicon站标设置插件 www.yiwuku.com erx@qq.com
RegisterPlugin("erx_Favicon","ActivePlugin_erx_Favicon");
function ActivePlugin_erx_Favicon() {
	Add_Filter_Plugin('Filter_Plugin_Index_Begin','erx_Favicon_main');
}
function erx_Favicon_main() {
	global $zbp;
	if($zbp->Config('erx_Favicon')->favicon){
		$zbp->header .=  $zbp->Config('erx_Favicon')->favcode . "\r\n";
	}
	if($zbp->Config('erx_Favicon')->apple){
		$zbp->header .=  $zbp->Config('erx_Favicon')->appcode . "\r\n";
	}
}
function InstallPlugin_erx_Favicon() {
	global $zbp;
	//配置初始化
	if (!$zbp->Config('erx_Favicon')->HasKey('version')) {
		$zbp->Config('erx_Favicon')->version = '1.0';
		$zbp->Config('erx_Favicon')->favicon='1';
		$zbp->Config('erx_Favicon')->favcode='<link rel="shortcut icon" href="'.$zbp->host.'zb_users/plugin/erx_Favicon/favicon.ico" type="image/x-icon">';
		$zbp->Config('erx_Favicon')->apple='1';
		$zbp->Config('erx_Favicon')->appcode='<link rel="apple-touch-icon" href="'.$zbp->host.'zb_users/plugin/erx_Favicon/apple.png">';
		$zbp->SaveConfig('erx_Favicon');
	}
}
function UninstallPlugin_erx_Favicon() {
	global $zbp;
	//$zbp->DelConfig('erx_Favicon');
}