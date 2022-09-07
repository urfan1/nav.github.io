<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('New_Login')) {$zbp->ShowError(48);die();}

$blogtitle='自定义登录模板';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
if (file_exists($zbp->path . 'zb_users/cache/compiled/' . $zbp->option['ZC_BLOG_THEME'] . '/Login_0.php') == false) {
    $zbp->BuildTemplate();
}
?>

<?php 
if(count($_POST)>0){
	if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
	foreach($_POST as $key=>$value){
    if($key == 'csrfToken'){continue;}
        $zbp->Config('New_Login')->$key = trim($value);
	}
   	$zbp->SaveConfig('New_Login');
	$zbp->SetHint('good','保存成功');
	Redirect('./setting.php');
}

?>

<div id="divMain">
  <div class="divHeader2"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
	<a href="setting.php"><span class="m-left m-now">基础配置</span></a>
    <?php 
    foreach ($GLOBALS['hooks']['Filter_Plugin_Admin_ThemeMng_SubMenu'] as $fpname => &$fpsignal) {
    	if ($fpname == 'themeEditor_Admin_ThemeMng_SubMenu') {
    		continue;
    	}
        $fpname();
    }
    if($zbp->CheckPlugin('KODExplorer')){
	echo '<a href="' . $zbp->host . 'zb_users/plugin/KODExplorer/main.php?explorer&path=';
	echo urlencode($usersdir . 'plugin/New_Login/template/');
	echo '"><span class="m-left">在线编辑登录模板</span></a>';
	} ?>
	<a href="<?php echo 'javascript:statistic(\'' . BuildSafeCmdURL('act=misc&type=statistic&forced=1') . '\');';?>" id="statistic"><span class="m-right "><?php if ($GLOBALS['blogversion'] > 170000): ?><i class="icon-arrow-repeat" style="font-size:small;margin-right: 0.2em;" alt="重新编译模板" title="重新编译模板"></i><?php endif;?><img id="statloading" style="display: none;" src="../../../zb_system/image/admin/loading.gif" alt="">重新编译模板</span></a>
  </div>
  <div id="divMain2">
  	<form action="<?php echo BuildSafeURL("setting.php?act=save"); ?>" method="post">
      <table class="tableFull tableBorder table_hover table_striped">
        <tbody><tr>
          <th class="td15">名称</th>
          <th>内容</th>
        </tr>
        <tr>
          <td>新的登录地址</td>
          <td><?php echo zbpform::text("newUrl", $zbp->Config("New_Login")->newUrl, "99%"); ?><p>* 默认仅支持动态即填写GET参数即可,如填写：NewLogin,则登录地址为<?php echo $zbp->host . "?NewLogin";?> 留空则默认这个</p></td>
        </tr>
        <tr>
          <td>登录后跳转地址</td>
          <td><?php echo zbpform::text("rUrl", $zbp->Config("New_Login")->rUrl, "99%"); ?><p>* 请填写完整地址,主要考虑到一些使用用户中心插件用户,留空系统默认地址</p></td>
        </tr>
        <tr>
          <td>关闭系统登录地址</td>
          <td><?php echo zbpform::radio('isOff',array('否', '是'),$zbp->Config("New_Login")->isOff); ?></td>
        </tr>
        <tr><td colspan="2">帮助：首次使用或更新版本请重新编译模板，如需更多个性化定制欢迎定制 <a href="http://www.newbii.cn" target="_blank">www.newbii.cn</a></td></tr>
      </tbody></table>
      <p>
          <input type="submit" value="提交"> <input type="button" onclick='location.href=("main.php")' value="选择模板" >
      </p>
    </form>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>