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
if(!isset($zbp->Config('New_Login')->template)) {
	$zbp->Config('New_Login')->template = '0';
	$zbp->SaveConfig('New_Login');
}
if(count($_POST)>0){
	if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
	foreach($_POST as $key=>$value){
    if($key == 'csrfToken'){continue;}
        $zbp->Config('New_Login')->$key = trim($value);
	}
   	$zbp->SaveConfig('New_Login');
	$zbp->SetHint('good','保存成功');
	Redirect('./main.php');
}

$array = array("带背景的登录注册模板", "h5炫酷后台登录页面模板", "简洁的账号密码/验证码登录页面模板", "黑色的登录注册3D切换模板", "酷炫的运营系统后台登录模板", "css3全屏背景的动效登录页面模板", "山水背景的登录页面html模板", "html5动态背景用户登录页面模板", "html5酷炫火星救援登录页面模板", "动态下雪背景的用户登录注册页面模板", "html5星空背景的登录页面模板下载", "绿色透明的html5站点后台登录系统界面模板", "紫色的css3会员登录动画页面模板", "酷炫3D云背景登录后台模板", "简单的html5载入登录模板", "html5棱形动态背景登录模板", "创意的熊猫遮眼登模板", "透明碎片的登录框ui表单模板");

?>
<style>
div.theme .view {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.2) url(static/img/view.png) center no-repeat;
    background-color: rgba(0,0,0,.2);
    -webkit-transition: all ease-out .35s;
    transition: all ease-out .35s;
}
div.theme .theme-view {
	position: relative;
}
div.theme .theme-view:hover .view {
    opacity: 1;
}
</style>
<div id="divMain">
  <div class="divHeader2"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
	<a href="setting.php"><span class="m-left">基础配置</span></a>
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
    <form id="frmThemeLogin" method="post" action="data.php">
		<?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="'.$zbp->GetCSRFToken().'">';}?>
		<input type="hidden" name="template" id="template" value=""><input type="hidden" name="isRefresh" id="isRefresh" value="">
		<?php for($i=0; $i<=17; $i++){  
			$option='';
			if($zbp->Config('New_Login')->template===$i) {
				$now=' theme-now';
			}else{
				$now=' theme-other';
			}
			$newUrl = ($zbp->Config('New_Login')->newUrl) ? $zbp->Config('New_Login')->newUrl : "NewLogin";
        echo <<<HTML
		<div class="theme {$now}" data-themeid="{$i}" data-themename="{$array[$i]}">
			<div class="theme-name">
				<img width="16" title="" alt="" src="{$zbp->host}zb_system/image/admin/layout.png">&nbsp;&nbsp;
				<a target="_blank" href="{$zbp->host}?{$newUrl}&style={$i}" title="">
					<strong style="display:none;">{$i}</strong><b>{$array[$i]}</b>
				</a>
			</div>
			<div class="theme-view">
				<img src="{$zbp->host}zb_users/plugin/New_Login/static/img/Login_{$i}.jpg" title="{$array[$i]}" alt="{$array[$i]}" width="200" height="150">
				<a class="view" href="{$zbp->host}?{$newUrl}&style={$i}" target="_blank" title="预览前请先后台首页编译模板">实时预览</a>
			</div>
			<div class="theme-author">作者: <a href="http://www.newbii.cn/" target="_blank">菜鸟建站</a></div>
			<div class="theme-style">
				<select class="edit" size="1" title="样式"><option value="style">Login_{$i}.css</option></select>
				<input type="button" onclick="$('#isRefresh').val($(this).prev().val());$('#template').val({$i});$('#frmThemeLogin').submit();" class="theme-activate button" value="启用">
			</div>
			<p>首次使用或更新请重新编译模板</p>
		</div>
HTML;
}
?>
	</form>
<?php
?>

  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>