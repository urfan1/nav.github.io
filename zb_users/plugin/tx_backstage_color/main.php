<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('tx_backstage_color')) {$zbp->ShowError(48);die();}

$blogtitle='天兴工作室--后台配色';
require $blogpath . 'zb_system/admin/admin_header.php';
?>
<script src="source/jscolor.js" type="text/javascript"></script>
<style type="text/css">.tableBorder td{padding:10px}</style>
<?php
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">
  <div class="divHeader" style="border-bottom:1px solid #ddd;margin-bottom:12px;"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
 	<a href="main.php" ><span class="m-left">设置首页</span></a>
    <a href="http://www.txcstx.cn/" target="_blank"><span class="m-right">更多zblog应用</span></a>
  </div>
  <div id="divMain2">
<!--代码-->
    <?php
	if(isset($_POST['zs'])){
        $zbp->Config('tx_backstage_color')->zs = $_POST['zs'];
		$zbp->Config('tx_backstage_color')->fs = $_POST['fs'];
		$zbp->SaveConfig('tx_backstage_color');
		$zbp->SetHint('good');
		Redirect('./main.php');
	}
	?>
	
<form enctype="multipart/form-data" method="post" action="save.php?type=logo">  
<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
  <tr>
    <td width="50%"><label for="logo.png"><p align="left">上传logo(logo大小220*60，上传提交后请用力刷新你的浏览器才能看到效果，ps：不要用垃圾360浏览器！)</p></label></td>
    <td width="50%"><p align="left"><input name="logo.png" type="file"/>   <input name="" type="Submit" class="button" value="保存"/></p></td>
  </tr>
</table>
</form>	

<form enctype="multipart/form-data" method="post" action="save.php?type=bg">  
<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
  <tr>
    <td width="50%"><label for="login-bg.jpg"><p align="left">上传登录页面背景图(上传提交后请用力刷新你的浏览器才能看到效果，ps：不要用垃圾360浏览器！)</p></label></td>
    <td width="50%"><p align="left"><input name="login-bg.jpg" type="file"/>   <input name="" type="Submit" class="button" value="保存"/></p></td>
  </tr>
</table>
</form>	

<form action="main.php" method="post">
<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
   <tr>
    <td width="25%">辅助颜色(初始颜色0099cc)</td>
    <td width="25%"><input name="zs" type="text" class="color"  style="width:160px" value="#<?php echo $zbp->Config('tx_backstage_color')->zs;?>" /></input></td>
    <td width="25%">左侧栏颜色(初始颜色293038)</td>
    <td width="25%"><input name="fs" type="text" class="color"  style="width:160px" value="#<?php echo $zbp->Config('tx_backstage_color')->fs;?>" /></input>    </td>
  </tr>

    <tr>
    <td colspan="4">
        <input type="submit" name="submit" value="保存" />
    </td>
  </tr>

		</table>
	</form>

  </div>
</div>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/tx_backstage_color/logo.png';?>");</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>