<?php
#注册插件
RegisterPlugin("tx_backstage_color","ActivePlugin_tx_backstage_color");

function ActivePlugin_tx_backstage_color() {
	Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','tx_backstage_color_Zbp_MakeTemplatetags');
	Add_Filter_Plugin('Filter_Plugin_Admin_Header','tx_backstage_color_Css');
	Add_Filter_Plugin('Filter_Plugin_Login_Header','tx_backstage_color_Css');
	Add_Filter_Plugin('Filter_Plugin_Other_Header','tx_backstage_color_Css');
}

function tx_backstage_color_Css() {
	global $zbp;
    echo '<link rel="stylesheet" type="text/css" href="'. $zbp->host .'zb_users/plugin/tx_backstage_color/txcstx.css"/>' . "\r\n";
    echo '<style type="text/css"> 
   .left #leftmenu .on a,.left #leftmenu #on a:hover,input.button, input[type="submit"], input[type="button"],.SubMenu span.m-now,.pagebar a:hover,.pagebar .now-page,dd.username label, dd.password label,.bg .divHeader,.loginw > form > p > a,.menu ul li.on a{background-color: #' . $zbp->config('tx_backstage_color')->zs . '!important;}.left,.left #leftmenu li a,.bg,.left #leftmenu a:hover{background-color: #'. $zbp->config('tx_backstage_color')->fs . '!important;}input.button, input[type="submit"], input[type="button"]{border: 1px solid #' . $zbp->config('tx_backstage_color')->zs . '!important;}.pagebar a:hover,.pagebar .now-page{border: 1px solid #' . $zbp->config('tx_backstage_color')->fs . '!important;}.menu ul li.on a{border-color:#' . $zbp->config('tx_backstage_color')->zs . ';}</style>' . "\r\n";
}


function tx_backstage_color_Zbp_MakeTemplatetags() {
	global $zbp;

	$config = array(
		"zs" => $zbp->Config('tx_backstage_color')->zs,
		"fs" => $zbp->Config('tx_backstage_color')->fs,
	);

}

function InstallPlugin_tx_backstage_color() {
    global $zbp,$obj,$bucket;
    //配置初始化
    if (!$zbp->Config('tx_backstage_color')->HasKey('version')) {
        $zbp->Config('tx_backstage_color')->version = '1.0';
        $zbp->Config('tx_backstage_color')->zs = '0099cc';
		$zbp->Config('tx_backstage_color')->fs = '293038';
        $zbp->SaveConfig('tx_backstage_color');
    }

}


function UninstallPlugin_tx_backstage_color() {
	global $zbp;
//	$zbp->DelConfig('tx_backstage_color');
}