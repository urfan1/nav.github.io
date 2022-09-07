<?php
RegisterPlugin('faviconapi', 'ActivePlugin_faviconapi');
function faviconapi_SubMenu($id){
    	$arySubMenu = array(
		1 => array('基本设置', 'main', 'left', false),
	);
		foreach ( $arySubMenu as $k => $v ) {
        echo '<a href="' . $v[ 1 ] . '.php" ' . ( $v[ 3 ] == true ? 'target="_blank"' : '' ) . '><span class="m-' . $v[ 2 ] . ' ' . ( $id == $k ? 'm-now' : '' ) . '">' . $v[ 0 ] . '</span></a>';
    }
}
function InstallPlugin_faviconapi(){    				  		
	global $zbp;     		  	  
	if(!$zbp->Config('faviconapi')->HasKey('Version')){    	   		 	
        $zbp->Config( 'faviconapi' )->Version = '1.0';
        $zbp->SaveConfig('faviconapi');
	}    	 		  	  	 	  
}    				  	   			 	  	
function UninstallPlugin_faviconapi(){
	global $zbp;
	if ($zbp->Config('faviconapi')->clearSetting){
		$zbp->DelConfig('faviconapi');
	}
}  
//获取ico图标
function faviconapi_favicon($icon,$imgHtmlCode=true) {    	  		  	
    global $zbp;
    $favicon ='';
    $api = $zbp->host . 'zb_users/plugin/faviconapi/img/get.php?url=';
        if ($zbp->Config( 'faviconapi' )->faviconapi2){
        $favicon=$zbp->Config( 'faviconapi' )->faviconapi2.$icon;
        }
        else
        {
		$favicon=$api.$icon;
        }
    if ($zbp->Config( 'faviconapi' )->base64){
    return 'data:image/x-icon;base64,' . chunk_split(base64_encode(file_get_contents($favicon)));
    }else{
    return $favicon;
    }
}
//获取ico图标
function faviconapi_get() {
    global $zbp;
    $api = $zbp->host . 'zb_users/plugin/faviconapi/img/get.php?url=';
    return $api;
}
function faviconapi_getbaes64($imgHtmlCode=true) {
    global $zbp;
    $api = $zbp->host . 'zb_users/plugin/faviconapi/img/get.php?url=https://www.hnysnet.com';
    return 'data:image/x-icon;base64,' . chunk_split(base64_encode(file_get_contents($api)));
}
?>