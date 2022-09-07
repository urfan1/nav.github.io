<?php
#注册插件
/**
 * Author：mochu
 * HomePage：https://www.feiniaomy.com
 */
RegisterPlugin("xc_mouse","ActivePlugin_xc_mouse");

function ActivePlugin_xc_mouse() 
{
    // Filter_Plugin_Index_Begin
    Add_Filter_Plugin('Filter_Plugin_Index_Begin','xc_mouse_addjs');
}

function InstallPlugin_xc_mouse() 

{

}

function xc_mouse_addfilejs()
{
    global $zbp;

    $css = @file_get_contents($zbp->path . 'zb_users/plugin/xc_mouse/script/script.js');

    // 鼠标左键
    if($zbp->Config('xc_mouse')->custom){

        if($zbp->Config('xc_mouse')->type == 'confetti'){
            // 纸屑效果
            $css .= 'document.body.addEventListener("click", function (e) {
                party.confetti(e, {
                    count:'.(int)$zbp->Config('xc_mouse')->confetti_count.',
                    spread:'.(int)$zbp->Config('xc_mouse')->confetti_spread.',
                });
            });';
        }else{
            //星星效果
            $css .= 'document.body.addEventListener("click", function (e) {
                party.sparkles(e,{
                    count:'.(int)$zbp->Config('xc_mouse')->sparkles_count.',
                    size: '.(float)$zbp->Config('xc_mouse')->sparkles_size.',
                });
            });';
        }

    }else{
        if($zbp->Config('xc_mouse')->type == 'confetti'){
            // 纸屑效果
            $css .= 'document.body.addEventListener("click", function (e) {
                party.confetti(e);
            });';
        }else{
            //星星效果
            $css .= 'document.body.addEventListener("click", function (e) {
                party.sparkles(e);
            });';
        }
    }
    

    //鼠标右键纸屑
    if($zbp->Config('xc_mouse')->r_type == 'confetti'){

        if($zbp->Config('xc_mouse')->custom){
            $css .= 'document.body.addEventListener("contextmenu", function (e) {
                '.($zbp->Config('xc_mouse')->r_no ? 'e.preventDefault();':'').'
                party.confetti(e, {
                    count:'.(int)$zbp->Config('xc_mouse')->confetti_count.',
                    spread:'.(int)$zbp->Config('xc_mouse')->confetti_spread.',
                });
            });';
        }else{
            $css .= 'document.body.addEventListener("contextmenu", function (e) {
                '.($zbp->Config('xc_mouse')->r_no ? 'e.preventDefault();':'').'
                party.confetti(e);
            });';
        }

    }

    //鼠标右键星星
    if($zbp->Config('xc_mouse')->r_type == 'sparkles'){
        if($zbp->Config('xc_mouse')->custom){
            //星星效果
            $css .= 'document.body.addEventListener("contextmenu", function (e) {
                '.($zbp->Config('xc_mouse')->r_no ? 'e.preventDefault();':'').'
                party.sparkles(e,{
                    count:'.(int)$zbp->Config('xc_mouse')->sparkles_count.',
                    size: '.(float)$zbp->Config('xc_mouse')->sparkles_size.',
                });
            });';
        }else{
            //星星效果
            $css .= 'document.body.addEventListener("contextmenu", function (e) {
                '.($zbp->Config('xc_mouse')->r_no ? 'e.preventDefault();':'').'
                party.sparkles(e);
            });';
        }
    }

    $css = str_replace(array("\r","\n"),'', $css);
    @file_put_contents($zbp->usersdir . 'plugin/xc_mouse/theme/script.js', $css);

}

function xc_mouse_addjs()
{
    global $zbp;

    $zbp->footer .= '<script src="'.$zbp->host.'zb_users/plugin/xc_mouse/theme/script.js?v='.$zbp->Config('xc_mouse')->rand.'"></script>';
}

function UninstallPlugin_xc_mouse() {}