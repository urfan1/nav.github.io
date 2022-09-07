<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('MiniShow')) {$zbp->ShowError(48);die();}

$blogtitle='手机站广告神器';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
if(isset($_POST['Items'])){
    foreach($_POST['Items'] as $key=>$val){
       $zbp->Config('MiniShow')->$key = $val;
    }
    $zbp->SaveConfig('MiniShow');
    $zbp->ShowHint('good');
    Redirect('./main.php');
}
?>
<style>
.tb-set td{padding:7px 5px;}
.xti td{color:#3a6ea5;font-weight:bold;text-indent:5px;}
.itemp{padding:4px 7px;}
.itemp input{width:380px;}
.upbtn{display:inline-block;height:26px;line-height:26px;color:#fff;padding:0 18px;margin:0 0.5em;background:#3a6ea5;border:1px solid #39c;cursor:pointer;}
.upbtn:hover{background:#39c;}
.xtips{color:#999;line-height:1.6;padding-left:12px;}
</style>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
 	<a href="main.php" ><span class="m-left">参数设置</span></a>
    <a href="../../plugin/AppCentre/main.php?id=1208" target="_blank" title="更多广告位支持定时和多内容随机"><span class="m-left" style="color:#F60">有收费版？</span></a>
    <a href="../../plugin/AppCentre/main.php?auth=115"><span class="m-left">作者作品</span></a>
    <a href="http://www.yiwuku.com/" target="_blank"><span class="m-right">作者网站</span></a>
    <a href="http://www.yiwuku.com/a/481.html" target="_blank"><span class="m-right">插件说明</span></a>
  </div>
  <div id="divMain2">
    <table class="tb-set" width="100%">
        <form action="main.php" method="post">
        <tr height="40" class="xti">
            <td width="150">广告位名称</td>
            <td width="60">开关</td>
            <td width="550">广告图和链接</td>
            <td>代码内容</td>
        </tr>
        <tr>
            <td align="right" height="30"><b>全站顶部广告：</b></td>
            <td><input name="Items[mstopset]" id="mstopset" class="checkbox" type="text" value="<?php echo $zbp->Config('MiniShow')->mstopset;?>" /></td>
            <td><div class="itemp up_pic">图片：<input name="Items[mstoppic]" id="mstoppic" type="text" value="<?php echo $zbp->Config('MiniShow')->mstoppic;?>"><strong class="upbtn" title="操作成功后将自动生成新的图片地址，请注意保存设置">浏览</strong></div><div class="itemp">链接：<input name="Items[mstopurl]" id="mstopurl" type="text" value="<?php echo $zbp->Config('MiniShow')->mstopurl;?>"></div></td>
            <td><textarea name="Items[mstopcon]" cols="60" rows="5" style="vertical-align:middle" placeholder="第三方代码或自定义内容，默认无样式，填写即替代图链显示"><?php echo $zbp->Config('MiniShow')->mstopcon; ?></textarea></td>
        </tr>
        <tr>
            <td align="right" height="30"><b>全站底部广告：</b></td>
            <td><input name="Items[msbotset]" id="msbotset" class="checkbox" type="text" value="<?php echo $zbp->Config('MiniShow')->msbotset;?>" /></td>
            <td><div class="itemp up_pic">图片：<input name="Items[msbotpic]" id="msbotpic" type="text" value="<?php echo $zbp->Config('MiniShow')->msbotpic;?>"><strong class="upbtn" title="操作成功后将自动生成新的图片地址，请注意保存设置">浏览</strong></div><div class="itemp">链接：<input name="Items[msboturl]" id="msboturl" type="text" value="<?php echo $zbp->Config('MiniShow')->msboturl;?>"></div></td>
            <td><textarea name="Items[msbotcon]" cols="60" rows="5" style="vertical-align:middle" placeholder="第三方代码或自定义内容，默认无样式，填写即替代图链显示"><?php echo $zbp->Config('MiniShow')->msbotcon; ?></textarea></td>
        </tr>
        <tr height="40" class="xti">
            <td colspan="4">其它设置项</td>
        </tr>
        <tr height="50">
            <td align="right"><b>自定义附加内容：</b></td>
            <td colspan="3"><textarea name="Items[msplus]" cols="68" rows="6" style="vertical-align:middle" placeholder="其它广告代码或自定义内容，再为手机端加点什么？"><?php echo $zbp->Config('MiniShow')->msplus; ?></textarea></td>
        </tr>
        <tr height="50">
            <td align="right"><b>是否在电脑端显示：</b></td>
            <td colspan="3"><input id="mspcset" name="Items[mspcset]" type="text" value="<?php echo $zbp->Config('MiniShow')->mspcset;?>" class="checkbox"><span class="xtips">开启后电脑端也将显示以上广告内容</span></td>
        </tr>
        <tr>
            <td height="80">&nbsp;</td>
            <td colspan="3" valign="top"><input type="submit" name="submit" value="保存设置"></td>
        </tr>
        <tr height="50">
            <td colspan="4" width="150"><div class="xtips">注：图片不限尺寸自适应显示，上传基于系统默认集成的UEditor插件实现，无法启用时需通过FTP上传图片后手动填写对应地址；<br>温馨提示：电脑端网站如需使用更多广告/通知功能，推荐使用《<a href="../../plugin/AppCentre/main.php?id=925" target="_blank">广告投放管理器</a>》插件；</div></td>
        </tr>
    </table>
  </div>
</div>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/MiniShow/logo.png';?>");</script>
<?php
if ($zbp->CheckPlugin('UEditor')) { 
    echo '<script type="text/javascript" src="../../plugin/UEditor/ueditor.config.php"></script>';
    echo '<script type="text/javascript" src="../../plugin/UEditor/ueditor.all.min.js"></script>';
    echo '<script type="text/javascript" src="lib.upload.js"></script>';
}
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>