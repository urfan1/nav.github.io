<?php
#注册插件
RegisterPlugin("yk_slide_kefu","ActivePlugin_yk_slide_kefu");

function ActivePlugin_yk_slide_kefu() {
    Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','yk_slide_kefu_CSS');
    Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax','yk_slide_kefu_Cmd_Ajax'); //挂载接口
}

function yk_slide_kefu_Cmd_Ajax($src) {
    global $zbp;
    if ($src == 'yk_slide_kefu_upload'){
        if (!$zbp->CheckRights('UploadPst')) {
            $zbp->ShowError(6);
        }
        Add_Filter_Plugin('Filter_Plugin_Upload_SaveFile','yk_slide_kefu_Upload_SaveFile_Ajax');
        $_POST['auto_rename'] = 1;
        PostUpload();
        echo json_encode(array('url' => $GLOBALS['tmp_ul']->Url));
        exit;
    }
}

function yk_slide_kefu_Upload_SaveFile_Ajax($tmp, $ul){
    $GLOBALS['tmp_ul'] = $ul;
}

function yk_slide_kefu_CSS() {
    global $zbp;
    $zbp->header .= '<link href="'.$zbp->host.'zb_users/plugin/yk_slide_kefu/css/style.css" rel="stylesheet"/>' . "\r\n";
    $zbp->footer .=  '<script src="'.$zbp->host.'zb_users/plugin/yk_slide_kefu/js/customer.js"></script>' . "\r\n";
    $zbp->footer .= '<div class="suspension">
    <div class="suspension-box">
        <a href="#" class="a a-service "><i class="i"></i></a>
        <a href="javascript:;" class="a a-service-phone "><i class="i"></i></a>
        <a href="javascript:;" class="a a-qrcode"><i class="i"></i></a>
        <a href="javascript:;" class="a a-top"><i class="i"></i></a>
        <div class="d d-service">
            <i class="arrow"></i>
            <div class="inner-box">
                <div class="d-service-item clearfix">
                    <a href="http://wpa.qq.com/msgrd?v=3&uin='.$zbp->Config('yk_slide_kefu')->yk_slide_kefu_qq.'&site=qq&menu=yes" class="clearfix"><span class="circle"><i class="i-qq"></i></span><h3>咨询在线客服</h3></a>
                </div>
            </div>
        </div>
        <div class="d d-service-phone">
            <i class="arrow"></i>
            <div class="inner-box">
                <div class="d-service-item clearfix">
                    <span class="circle"><i class="i-tel"></i></span>
                    <div class="text">
                        <p>服务热线</p>
                        <p class="red number">'.$zbp->Config('yk_slide_kefu')->yk_slide_kefu_phone.'</p>
                    </div>
                </div>
                <div class="d-service-intro clearfix">
                    <p><i></i>'.$zbp->Config('yk_slide_kefu')->yk_slide_kefu_phone_dec.'</p>
                </div>
            </div>
        </div>
        <div class="d d-qrcode">
            <i class="arrow"></i>
            <div class="inner-box">
                <div class="qrcode-img"><img src="'.$zbp->Config('yk_slide_kefu')->yk_slide_kefu_wx.'" alt="微信客服" width="100%"></div>
                <p>微信客服</p>
            </div>
        </div>
    </div>
</div>';
}

function InstallPlugin_yk_slide_kefu() {}
function UninstallPlugin_yk_slide_kefu() {}