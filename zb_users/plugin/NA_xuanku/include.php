<?php
RegisterPlugin("NA_xuanku", "ActivePlugin_NA_xuanku");
function ActivePlugin_NA_xuanku()
{
    global $zbp;
    if ($zbp->Config('NA_xuanku')->is == 1) {
        Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags', 'NA_xuanku_main');
    } else {
        Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'NA_xuanku_main');
    }
}

function NA_xuanku_SubMenu($id)
{
    $arySubMenu = array(
        0 => array('配置', 'main.php', 'left', false),
    );
    foreach ($arySubMenu as $k => $v) {
        echo '<a href="' . $v[1] . '" ' . ($v[3] == true ? 'target="_blank"' : '') . '><span class="m-' . $v[2] . ' ' . ($id == $k ? 'm-now' : '') . '">' . $v[0] . '</span></a>';
    }
    echo '<a href="http://www.newapp.cc/" target="_blank"><span class="m-right" >赞助</span></a>
        <a href="http://wpa.qq.com/msgrd?v=3&uin=3033576915&site=qq&menu=yes" target="_blank" ><span class="m-left" style="color:#F00">QQ联系帮助</span></a>';
}

function NA_xuanku_main()
{
    global $zbp;
    $zbp->header .= '<link href="' . $zbp->host . 'zb_users/plugin/NA_xuanku/view/animate.min.css" rel="stylesheet" type="text/css" />
' . "\r\n";
    $zbp->header .= '<script src="' . $zbp->host . 'zb_users/plugin/NA_xuanku/view/wow.js"></script>' . "\r\n";
    $zbp->header .= '<script src="' . $zbp->host . 'zb_users/plugin/NA_xuanku/view/com.js"></script>' . "\r\n";
}

function InstallPlugin_NA_xuanku()
{
}

function UninstallPlugin_NA_xuanku()
{
}