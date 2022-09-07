<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('ytecn_order')) {$zbp->ShowError(48);die();}

if (count($_POST) > 0) {
  CheckIsRefererValid();
  if (isset($_POST['ytecn'])) {
    foreach ($_POST['ytecn'] as $key => $val) {
      $zbp->Config('ytecn_order')->$key = $val;
    }
    $zbp->SaveConfig('ytecn_order');
    $zbp->SetHint('good', '参数已保存');
  }
}

$blogtitle = '自定义排序模式';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle; ?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">
    <form id="form1" name="form1" method="post">
      <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken(); ?>">
      <table border="1" class="tableFull tableBorder">
        <tr>
          <th class="td30">
            <p align='left'><b>标题</b><br><span class='note'></span></p>
          </th>
          <th>说明</th>
        </tr>
        <tr>
          <td class="td30">
            <p align='left'><b>处理格式</b></p>
          </td>
          <td>
            <?php 
            $array=array();
            $array['0']="默认";
            $array['1']="文章ID倒序";
            $array['2']="文章ID正序";
            $array['3']="文章发布时间倒序";
            $array['4']="文章发布时间正序";
            $array['5']="分类正序";
            $array['6']="分类倒序";
            $array['7']="作者正序";
            $array['8']="作者倒序";
            $array['9']="文章修改时间倒序";
            $array['10']="文章修改时间正序";
            $array['11']="浏览量排序(nan赞助)";
            echo zbpform::radio('ytecn[type]', $array, $zbp->Config('ytecn_order')->type); ?>
          </td>
        </tr>
        <tr>
          <td class="td30"></td>
          <td>
            <input name="" type="Submit" class="button" value="保存" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>