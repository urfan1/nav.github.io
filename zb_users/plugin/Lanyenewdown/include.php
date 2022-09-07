<?php
/* 蓝叶清新下载样式ZblogPHP插件 */
RegisterPlugin("Lanyenewdown","ActivePlugin_Lanyenewdown");//注册插件
 
function ActivePlugin_Lanyenewdown() {
    global $zbp;
    Add_Filter_Plugin('Filter_Plugin_Edit_Response5','Lanyenewdown');
	Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','Lanyenewdown_css');
}
function Lanyenewdown(){
global $zbp;
?>
<script>
$(document).ready(function(){
$('#edtTitle').css({'border-radius':'4px','margin-left':'0','box-shadow':'rgba(177,178,179,0.3) 0px 0px 4px 1px'});
$('.lanye_down_t').click(function(){
$('.lanye_down_m,.bobybg').fadeIn();
});
$('#file_close').click(function(){
$('.lanye_down_m,.bobybg').fadeOut();
});
$("#file_del").click(function(){
$('.lanye_down_m input').attr('value','');
});
$("#file_in").click(function(){
if($('#file_code').val().length>0){var file_code = '<em>密码：'+$('#file_code').val()+'</em><em>|</em>';}else{var file_code = '';}
editor_api.editor.content.put(editor_api.editor.content.get()+"<div class='newfujian'><div class='fileico "+($('#file_type').val())+"'></div><div class='filecont'><div class='filetit'><a href='"+($('#file_url').val())+"' target='_blank' rel='nofollow' title='点击下载'>"+($('#file_name').val())+"</a>"+file_code+"<em>大小："+($('#file_size').val())+"</em></div><div class='fileaq'>已经过安全软件检测无毒，请您放心下载。</div></div><div class='down_2'><a href='"+($('#file_url').val())+"' target='_blank' rel='nofollow' title='点击下载'></a></div></div>");
});
})
</script>
<style>
.bobybg{position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%;background:rgba(0,0,0,0.3);z-index:9998;display:none;}
.lanye_down{position:relative;}
.lanye_down_t{background-color:#00aff0;background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-size: 30px 30px;width:130px;text-align:center;padding:10px 5px;margin:0 10px 10px 0;color:#fff;border-radius:4px;font-family:Microsoft Yahei;font-weight: bold;cursor:pointer;box-shadow: 0 0 4px 1px rgba(16, 160, 249, 0.3);}
.lanye_down_m{display:none;position:absolute;top:60px;left:0;right:0;margin:0 auto;z-index:9999;width:450px;background:#fff;box-shadow:0 0 5px 2px rgba(0,0,0,0.3);padding:10px;border-radius:4px;}
.lanye_down_m p{padding:0;line-height:normal;margin-bottom:10px;}
.lanye_down_m label{padding:8px;font-size:14px;color:#555;text-align:center;background-color:#eee;border:1px solid #ccc;border-radius:4px;float:left;border-bottom-right-radius:0;border-top-right-radius:0;}
.lanye_down_m select{outline:none;height:34px;padding:5px 10px;font-size:14px;line-height:1.42857143;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;border-bottom-left-radius:0;border-top-left-radius:0;border-left:0;}
.lanye_down_m input{outline:none;width:355px;height:26px;padding:5px 10px;font-size:14px;line-height:1.42857143;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;border-bottom-left-radius:0;border-top-left-radius:0;border-left:0;}
.lanye_down_tool{margin:15px auto 10px;width:270px;display:table;}
.lanye_down_tool span{float:left;cursor:pointer;border:0;padding:10px 15px;font-size: 12px;margin: 0 10px 0 0;border-radius:4px;color:#fff;background-color:#337ab7;background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-size: 30px 30px;box-shadow: 0 0 4px 1px rgba(16, 160, 249, 0.3);}
#file_del{background-color:#5cb85c;}#file_close{background-color:#f0ad4e;}
.lanye_down_tool span:hover{background-size: 20px 20px;}
</style>
<div class="bobybg"></div>
<div class="lanye_down" title="蓝叶清新下载样式">
<div class="lanye_down_t">蓝叶清新下载样式</div>
<div class="lanye_down_m">
<p><label>文件类型</label><select name="file_type" id="file_type"><option value="rar">压缩文件</option><option value="img">图片文件</option><option value="pdf">PDF文档</option><option value="doc">Word文档</option><option value="xls">Xls文档</option><option value="txt">文本文件</option><option value="audio">音乐文件</option><option value="video">视频文件</option><option value="ppt">PPT文件</option><option value="exe">程序文件</option><option value="apk">APK文件</option><option value="bt">BT种子</option></select></p>
<p><label>下载名称</label><input name="file_name" id="file_name" value="" placeholder="输入下载文件的名称" /></p>
<p><label>文件大小</label><input name="file_size" id="file_size" value="" placeholder="输入下载文件的大小，例如：10MB" /></p>
<p><label>提取密码</label><input name="file_code" id="file_code" value="" placeholder="输入下载文件的提取密码，没有请留空" /></p>
<p><label>下载地址</label><input name="file_url" id="file_url" value="" placeholder="输入下载文件的链接网址，例如：http://lanyes.org" /></p>
<div class="lanye_down_tool"><span id="file_in">插入代码</span><span id="file_del">重新输入</span><span id="file_close">关闭工具</span></div>
</div>
</div>
<?php }

function Lanyenewdown_css(){
global $zbp;
$zbp->footer .='<link href="'.$zbp->host.'zb_users/plugin/Lanyenewdown/lanyenewdown.css" rel="stylesheet" type="text/css" />'."\r\n";
}