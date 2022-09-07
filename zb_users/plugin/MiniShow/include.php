<?php
#注册插件
RegisterPlugin("MiniShow","ActivePlugin_MiniShow");
function ActivePlugin_MiniShow() {
	Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','MiniShow_box');
}
function MiniShow_box() {
	global $zbp;
	$config = array(
		"mstopset" => $zbp->Config('MiniShow')->mstopset,
		"mstopurl" => $zbp->Config('MiniShow')->mstopurl,
		"mstoppic" => $zbp->Config('MiniShow')->mstoppic,
		"mstopcon" => $zbp->Config('MiniShow')->mstopcon,
		"msbotset" => $zbp->Config('MiniShow')->msbotset,
		"msboturl" => $zbp->Config('MiniShow')->msboturl,
		"msbotpic" => $zbp->Config('MiniShow')->msbotpic,
		"msbotcon" => $zbp->Config('MiniShow')->msbotcon,
		"msplus" => $zbp->Config('MiniShow')->msplus,
		"mspcset" => $zbp->Config('MiniShow')->mspcset
	);
	if($zbp->Config('MiniShow')->mspcset || MiniShow_is_mobile()){
		$zbp->header .= '<link href="'.$zbp->host.'zb_users/plugin/MiniShow/style.css" rel="stylesheet" type="text/css" />'."\r\n";
		$zbp->header .= '<script>document.writeln(unescape("%3Cscript src=\""+bloghost+"zb_users/plugin/MiniShow/main.js\" type=\"text/javascript\"%3E%3C/script%3E"));</script>' . "\r\n";
		if(!empty($_COOKIE['mnstop'])){
			$mnstop = $_COOKIE['mnstop'];
		}else{
			$mnstop = "";
		}
		if($zbp->Config('MiniShow')->mstopset){
			if($zbp->Config('MiniShow')->mstopcon=="" && $mnstop!="1"){
				$zbp->footer .= '<div class="mnshow mnstop"><a href="'.$zbp->Config('MiniShow')->mstopurl.'"><img src="'.$zbp->Config('MiniShow')->mstoppic.'"></a></div>';
			}else{
				$zbp->footer .= $zbp->Config('MiniShow')->mstopcon;
			}
		}
		if(!empty($_COOKIE['mnsbot'])){
			$mnsbot = $_COOKIE['mnsbot'];
		}else{
			$mnsbot = "";
		}
		if($zbp->Config('MiniShow')->msbotset){
			if($zbp->Config('MiniShow')->msbotcon=="" && $mnsbot!="1"){
				$zbp->footer .= '<div class="mnshow mnsbot"><a href="'.$zbp->Config('MiniShow')->msboturl.'"><img src="'.$zbp->Config('MiniShow')->msbotpic.'"></a></div>';
			}else{
				$zbp->footer .= $zbp->Config('MiniShow')->msbotcon;
			}
		}
		$zbp->footer .= $zbp->Config('MiniShow')->msplus;
	}
}
function MiniShow_is_mobile(){
    $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
    $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
    $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";  
    $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
    $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|micromessenger";
    $regex_match.=")/i";      
    return isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']) or preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}
function InstallPlugin_MiniShow() {
    global $zbp;
    //配置初始化
    if (!$zbp->Config('MiniShow')->HasKey('mstopset')) {
    	$zbp->Config('MiniShow')->mstopset = '1';
		$zbp->Config('MiniShow')->mstopurl = 'https://app.zblogcn.com/?auth=115';
		$zbp->Config('MiniShow')->mstoppic = $zbp->host.'zb_users/plugin/MiniShow/img/mstop.gif';
		$zbp->Config('MiniShow')->mstopcon = '';
		$zbp->Config('MiniShow')->msbotset = '1';
		$zbp->Config('MiniShow')->msboturl = 'https://app.zblogcn.com/?auth=115';
		$zbp->Config('MiniShow')->msbotpic = $zbp->host.'zb_users/plugin/MiniShow/img/msbot.gif';
		$zbp->Config('MiniShow')->msbotcon = '';
		$zbp->Config('MiniShow')->msplus = '';
		$zbp->Config('MiniShow')->mspcset = '0';
        $zbp->SaveConfig('MiniShow');
    }
}
function UninstallPlugin_MiniShow() {
	global $zbp;
	//$zbp->DelConfig('MiniShow');
}