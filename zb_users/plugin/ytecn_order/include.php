<?php
#注册插件
RegisterPlugin("ytecn_order","ActivePlugin_ytecn_order");

function ActivePlugin_ytecn_order() {
    Add_Filter_Plugin('Filter_Plugin_LargeData_Article', 'ytecn_order_LargeData_GetList');
}
function InstallPlugin_ytecn_order() {}
function UninstallPlugin_ytecn_order() {}

function ytecn_order_LargeData_GetList(&$select, &$w, &$order, &$count, &$option) {
    global $zbp;
    if($zbp->Config('ytecn_order')->type==1){
        $order = array('log_ID' => 'DESC');
    }
    if($zbp->Config('ytecn_order')->type==2){
        $order = array('log_ID' => 'ASC');
    }
    if($zbp->Config('ytecn_order')->type==3){
        $order = array('log_PostTime' => 'DESC');
    }
    if($zbp->Config('ytecn_order')->type==4){
        $order = array('log_PostTime' => 'ASC');
    }
    if($zbp->Config('ytecn_order')->type==5){
        $order = array('log_CateID' => 'ASC','log_ID' => 'ASC');
    }
    if($zbp->Config('ytecn_order')->type==6){
        $order = array('log_CateID' => 'DEsC','log_ID' => 'ASC');
    }
    if($zbp->Config('ytecn_order')->type==7){
        $order = array('log_AuthorID' => 'ASC','log_ID' => 'ASC');
    }
    if($zbp->Config('ytecn_order')->type==8){
        $order = array('log_AuthorID' => 'DEsC','log_ID' => 'ASC');
    }
    if($zbp->Config('ytecn_order')->type==9){
        $order = array('log_UpdateTime' => 'DESC');
    }
    if($zbp->Config('ytecn_order')->type==10){
        $order = array('log_UpdateTime' => 'ASC');
    }
    if($zbp->Config('ytecn_order')->type==11){
        $order = array('log_ViewNums' => 'DESC');
    }
}