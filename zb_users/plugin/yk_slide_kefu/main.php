<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('yk_slide_kefu')) {$zbp->ShowError(48);die();}

if (count($_POST) > 0) {
CheckIsRefererValid();
}

$blogtitle='侧边悬浮客服插件';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if (GetVars("act", "get") == 'save') {
    CheckIsRefererValid();
    foreach ($_POST as $key => $val) {
        $zbp->Config('yk_slide_kefu')->$key = $val;
    }
    $zbp->SaveConfig('yk_slide_kefu');
    $zbp->BuildTemplate(); //重建模板
    $zbp->SetHint('good');//成功
    Redirect('./main.php'); //防止页面出现重复提交的提示
}

?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">
      <form action="<?php echo BuildSafeURL("main.php?act=save"); ?>" method="post" enctype="multipart/form-data">
          <table class="tableFull tableBorder">
              <tr>
                  <td>电话</td>
                  <td>
                      <p>号码：<input type="text" name="yk_slide_kefu_phone" value="<?php echo $zbp->Config('yk_slide_kefu')->yk_slide_kefu_phone ?>"></p>
                      <p>号码下部文字描述：<input type="text" name="yk_slide_kefu_phone_dec" value="<?php echo $zbp->Config('yk_slide_kefu')->yk_slide_kefu_phone_dec ?>"></p>
                  </td>
              </tr>
              <tr>
                  <td>QQ</td>
                  <td>
                      <input type="text" name="yk_slide_kefu_qq" value="<?php echo $zbp->Config('yk_slide_kefu')->yk_slide_kefu_qq ?>">
                  </td>
              </tr>
              <tr>
                  <td>二维码</td>
                  <td>
                      <input placeholder="请输入图片url" class="yk_upload_input" name="yk_slide_kefu_wx" style="margin-right: 10px;width: 65%" type="text" value="<?php echo $zbp->Config('yk_slide_kefu')->yk_slide_kefu_wx; ?>"/>
                      <input type="button" class="button yk_upload_button" value="上传">
                  </td>
              </tr>
          </table>
          <hr/>
          <p>
              <input type="submit" class="button" value="<?php echo $lang['msg']['submit']?>" />
          </p>
      </form>
  </div>
</div>

<?php
echo '<script src="'.$zbp->host.'zb_users/plugin/yk_slide_kefu/js/upload.js"></script>';
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>