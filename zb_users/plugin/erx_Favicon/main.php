<?php
//Favicon站标设置插件 www.yiwuku.com erx@qq.com
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('erx_Favicon')) {$zbp->ShowError(48);die();}
$blogtitle='Favicon站标设置';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
if(isset($_POST['Items'])){
    foreach($_POST['Items'] as $key=>$val){
       $zbp->Config('erx_Favicon')->$key = $val;
    }
  $zbp->SaveConfig('erx_Favicon');
  $zbp->ShowHint('good');
  //Redirect('./main.php');
}
?>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
    <a href="main.php" ><span class="m-left m-now">基本设置</span></a>
    <a href="../../plugin/AppCentre/main.php?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194"><span class="m-left">作者作品</span></a>
    <a href="../../plugin/AppCentre/main.php?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194"><span class="m-left">插件官网</span></a>
    <a href="http://www.yiwuku.com/diy-zblog.html" target="_blank"><span class="m-left">定制服务</span></a>
    <a href="http://www.yiwuku.com/" target="_blank"><span class="m-right">作者网站</span></a>
  </div>
  <div id="divMain2">
<style type="text/css">
.xtips{color:#999;margin-left:15px}
div.xtips{line-height:1.8;padding:6px 0;}
.xtips2{display:inline-block;vertical-align:middle;}
td img{vertical-align:middle;}
input.button2{height:auto;padding:10px 35px;}
td textarea{margin:3px 0;vertical-align:middle;}
.orange, .xtips3, .xtips4{color:#f80;}
.xtips3, .xtips4{margin-left:15px;}
.dcode, .xtips3{display:none;}
</style>
<script type="text/javascript">
$(function(){  
    var mfavicon = $(".mfavicon").attr("src"), ifavicon = $(".ifavicon").attr("src"), favcode = $("#favcode").val(), appcode = $("#appcode").val();
    if(mfavicon.indexOf("upload/")>0){
        $("#favcode").val(favcode.replace("plugin/erx_Favicon","upload"));
    }
    if(ifavicon.indexOf("upload/")>0){
        $("#appcode").val(appcode.replace("plugin/erx_Favicon","upload"));
    }
    $(".dcode").each(function(){
        var c1 = $(this).val(), c2 = $(this).prev().val();
        if(c1 != c2){
            $(this).parent().find(".xtips3").show();
            $(".f-tip").addClass("orange");
        }
    });
}); 
</script>
    <table width="100%" class="tableBorder">
        <tr height="60">
            <td colspan="3"><strong>《Favicon站标设置》</strong>插件提示您：可以随时通过作者作品链接关注当前插件更新情况，以防错过更佳体验；</td>
        </tr>
        <?php if(file_exists("../../../favicon.ico")): ?>
        <tr height="60">
            <td width="200" align="right"><b>根目录站标检测：</b></td>
            <td width="600"><b class="orange">网站根目录下检测到favicon.ico文件，若忽略该站标可继续进行以下设置</b></td>
            <td><img src="<?php echo $zbp->host."favicon.ico"; ?>" height="32"></td>
        </tr>
        <?php endif; ?>
        <tr height="60">
            <td width="200" align="right"><b>上传新站标：</b></td>
            <td width="650"><form enctype="multipart/form-data" method="post" action="save.php?type=favicon"><input name="favicon.ico" type="file"><input name="" type="Submit" class="button" value="上传" title="首次上传时需要保存设置生效"><span class="xtips">建议尺寸32*32像素</span><?php if(!file_exists("../../../zb_users/upload/favicon.ico")): ?><span class="xtips4">(未上传)</span><?php endif; ?></form></td>
            <td><img src="<?php if(file_exists("../../../zb_users/upload/favicon.ico")){echo $zbp->host."zb_users/upload/favicon.ico";}else{echo $zbp->host."zb_users/plugin/erx_Favicon/favicon.ico";}?>" height="32" class="mfavicon"></td>
        </tr>
        <tr height="60">
            <td width="200" align="right"><b>上传IOS主屏图标：</b></td>
            <td width="600"><form enctype="multipart/form-data" method="post" action="save.php?type=apple"><input name="apple.png" type="file"><input name="" type="Submit" class="button" value="上传" title="首次上传时需要保存设置生效"><span class="xtips">建议尺寸144*144像素</span><?php if(!file_exists("../../../zb_users/upload/apple.png")): ?><span class="xtips4">(未上传)</span><?php endif; ?></form></td>
            <td><img src="<?php if(file_exists("../../../zb_users/upload/apple.png")){echo $zbp->host."zb_users/upload/apple.png";}else{echo $zbp->host."zb_users/plugin/erx_Favicon/apple.png";}?>" height="50" class="ifavicon"></td>
        </tr>
    </table>
	<form id="form1" name="form1" method="post">
    <table class="tb-set" width="100%">
        <tr height="60">
            <td width="200" align="right"><b>是否放置站标加载语句：</b></td>
            <td><input name="Items[favicon]" type="text" value="<?php echo $zbp->Config('erx_Favicon')->favicon;?>" class="checkbox"><span class="xtips">除非已将图标文件移至网站根目录，否则此项须保持开启</span></td>
        </tr>
        <tr>
            <td align="right"><b>站标加载语句：</b></td>
            <td><textarea cols="68" rows="5" name="Items[favcode]" id="favcode"><?php echo $zbp->Config('erx_Favicon')->favcode;?></textarea><textarea class="dcode"><?php echo $zbp->Config('erx_Favicon')->favcode;?></textarea><span class="xtips">默认标准语句，一般情况下无需修改</span><span class="xtips3">(请保存设置)</span></td>
        </tr>
        <tr height="60">
            <td align="right"><b>是否放置IOS图标加载语句：</b></td>
            <td><input name="Items[apple]" type="text" value="<?php echo $zbp->Config('erx_Favicon')->apple;?>" class="checkbox"><span class="xtips">苹果设备专用图标，仅在网站被加入到IOS主屏时起作用</span></td>
        </tr>
        <tr height="60">
            <td align="right"><b>IOS图标加载语句：</b></td>
            <td><textarea cols="68" rows="5" name="Items[appcode]" id="appcode"><?php echo $zbp->Config('erx_Favicon')->appcode;?></textarea><textarea class="dcode"><?php echo $zbp->Config('erx_Favicon')->appcode;?></textarea><span class="xtips">默认标准语句，一般情况下无需修改</span><span class="xtips3">(请保存设置)</span></td>
        </tr>
        <tr>
            <td colspan="2"><div class="xtips">
            当前插件主要作用是为网站添加站标和IOS主屏图标，
            IOS图标是指在苹果设备中将网站添加到主屏中时使用的图标，<a href="http://www.yiwuku.com/a/19913.html" target="_blank"><b>点击这里</b></a>了解更多站标知识；<br>
            在线工具：想临时找一个图标做为站标可以<a href="https://www.easyicon.net" target="_blank">点击这里</a>搜索，已有gif/png/jpg格式图片需要变成favicon.ico，可以<a href="http://www.bitbug.net" target="_blank">点击这里</a>去转换；<br>
            当favicon.ico图标手动上传或移动到<a href="http://www.yiwuku.com/a/19980.html" target="_blank">网站根目录</a>时，标准浏览器会自动识别而不需要加载语句，插件默认上传图标目录为“/zb_users/upload/”；<br>
            <b class="f-tip">首次上传图标后，加载语句中的图标目录会自动发生变化，此时需要保存设置生效，以防仍然调用插件预置的示例图标；</b><br>
             成品应用仅为满足大众化需求，如需个性化修改定制欢迎 <a href="http://wpa.qq.com/msgrd?v=3&uin=77940140&site=qq&menu=yes" target="_blank">联系作者</a> 定制，<a href="../../plugin/AppCentre/main.php?auth=3ec7ee20-80f2-498a-a5dd-fda19b198194">更多作者作品</a>？</div></td>
        </tr>
        <tr height="80">
            <td colspan="2" align="center"><input type="submit" class="button button2" value="保存基本设置"></td>
        </tr>
    </table><br><br>
    </form>
  </div>
</div>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/erx_Favicon/logo.png';?>");</script> 
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
