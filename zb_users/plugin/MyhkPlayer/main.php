<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('MyhkPlayer')) {$zbp->ShowError(48);die();}
$blogtitle='明月浩空音乐播放器';
require $blogpath . 'zb_system/admin/admin_header.php';
?>
<script src="source/jscolor.js" type="text/javascript"></script>
<style type="text/css">.tb-set td{padding:10px}</style>
<?php
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
 	<a href="https://myhkw.cn" title="访问播放器专用后台编辑歌单" target="_blank"><span class="m-left" style="color:#f00">歌单管理面板</span></a>
  </div>
  <div id="divMain2">
<!--代码-->
    <?php
	
	if(isset($_POST['id'])){
        $zbp->Config('MyhkPlayer')->jq = $_POST['jq'];
        $zbp->Config('MyhkPlayer')->mb = $_POST['mb'];
        $zbp->Config('MyhkPlayer')->id = $_POST['id'];
		$zbp->SaveConfig('MyhkPlayer');
		$zbp->SetHint('good');
		Redirect('./main.php');
	}
	?>
	<form action="main.php" method="post">
		<table class="tb-set" width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0'>	
<tr>
	<td align="right"><b>加载jquery：</b><br />(没有jquery库时请打开，JS冲突请关闭)</td>
    <td><span class="sel"><select name="jq"><option value="open" <?php if($zbp->Config('MyhkPlayer')->jq=="open") echo "selected"; ?>>开启</option><option value="close" <?php if($zbp->Config('MyhkPlayer')->jq
    !="open") echo "selected"; ?>>关闭</option></select></span></td>
</tr>
<tr>
	<td align="right"><b>移动端加载：</b><br />(开启后将在手机，iPad等移动设备加载播放器)</td>
	<td><span class="sel"><select name="mb"><option value="open" <?php if($zbp->Config('MyhkPlayer')->mb=="open") echo "selected"; ?>>开启</option><option value="close" <?php if($zbp->Config('MyhkPlayer')->mb!="open") echo "selected"; ?>>关闭</option></select></span></td>
</tr>
<tr>
    <td align="right" width="30%"><b>播放器ID：</b><br />(填写<b>播放器控制面板</b>自己的播放器ID，免注册公用ID：demo)</td>
    <td colspan="3"><input type="text" class="txt txt-sho"  style="width:91%;color:#f00;font-weight:bold;" name="id" value="<?php echo $zbp->Config('MyhkPlayer')->id; ?>" /></td>
</tr>			

<tr>
	<td align="right"><b>后台地址：</b><br />(免费注册创建播放器后台管理地址)</td>
	<td><b><a href="https://myhkw.cn" target="_blank">https://myhkw.cn</b></a></td>
</tr>

			<tr>
				<td colspan="4"><input type="submit" name="submit" value="保存设置" /></td>
			</tr>
		</table>
	</form>

  </div>
</div>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/MyhkPlayer/logo.png';?>");</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>