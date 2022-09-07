<?php
// 插件ID:faviconapi 
// 插件作者：星岚工作室(bloggo)
// 版权所有 盗卖必究！
// QQ:914466480
// Email:hnysnet@qq.com
// https://www.hnysnet.com
require '../../../zb_system/function/c_system_base.php';      		  	 
require $blogpath . 'zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if ( !$zbp->CheckRights( $action ) ) {
	$zbp->ShowError( 6 );
	die();
}
if ( !$zbp->CheckPlugin( 'faviconapi' ) ) {
	$zbp->ShowError( 48 );
	die();
}
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';  	 	 	 		 		 	 	 	
?>

<div id="divMain">
  <div class="divHeader">Favicon.ico远程获取API</div>
  <div class="SubMenu">
	 <?php faviconapi_SubMenu(1);?> 
  </div>
  <div id="divMain2">	
        <?php
        if(count($_POST)>0){
        if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();
        $zbp->Config( 'faviconapi' )->base64 = $_POST[ 'base64' ];
        $zbp->Config( 'faviconapi' )->faviconapi2 = $_POST[ 'faviconapi2' ];
        $zbp->SaveConfig( 'faviconapi' );
        $zbp->ShowHint( 'good' );
        }
        ?>
		<form id="form1" name="form1" method="post">
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">

    <tr>
    <td class="td25">
    <b>API调用方法</b>
    </td>
    <td><p><pre class="prism-highlight prism-language-markup">{php}$url=&#39;目标网址&#39;;{/php}&lt;img src=&quot;{faviconapi_favicon($url)}&quot;&gt;</pre></p>
        <p><pre class="prism-highlight prism-language-markup">例如：{php}$url=&#39;https://www.hnysnet.com&#39;;{/php}&lt;img src=&quot;{faviconapi_favicon($url)}&quot;&gt;</pre></p>
        <p>预览（图片）：<img src="<?php echo faviconapi_get(); ?>https://www.hnysnet.com"></p>
        <p>预览（图片地址）：<?php echo faviconapi_get()?>https://www.hnysnet.com</p>
        <p>预览（图片地址baes64编码）：<?php echo faviconapi_getbaes64(); ?></p>  
        <P>目标网址前面的http://可以加，也可以不加。但如果是https://头，则必须加上</P>
        <P>如果你的网站后台——文章编辑有增加网址字段，例如：$article->Metas->weburl，可以结合插件标签这样使用：{faviconapi_favicon($article->Metas->weburl)}</P>
        </td>
    </tr>
    <tr>
    <td>
    <b>图片地址base64编码</b>
    <br>base64编码可以隐藏图片地址中的API接口，但可能导致网页变慢
    </td>
    <td><p><input type="text" name="base64" class="checkbox" value="<?php echo $zbp->Config('faviconapi')->base64;?>"/></p></td>
    </tr>

    <tr>
    <td><b>其它API地址</b><br>填写后代替插件的API地址
    </td>
    
    <td><p><input name="faviconapi2" type="text" value="<?php echo $zbp->Config('faviconapi')->faviconapi2; ?>" class="mw600"/></p>
    </td>
    
    </tr>
   
    </table>
        <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
        <input name="" type="Submit" class="button" value="保存"/>
		</form>
	</div>
</div>
<script>
document.writeln("<div class=\'author\'>");
document.writeln("<span>plugin by <a target=\'_blank\' href=\'https://www.hnysnet.com/\'>燕山网络科技（星岚工作室）</a></span>|<span><a target=\'_blank\' href=\'<?php echo $bloghost?>zb_users/plugin/AppCentre/main.php?auth=098236fa-3e93-4127-8a50-6c39ffb8d6a4\'>作品集</a></span>|<span><a target=\'_blank\' href=\'https://www.hnysnet.com/wenti/4593.html\'>售后服务</a></span>|<span><a target=\'_blank\' href=\'https://www.hnysnet.com/logs/\'>作品升级记录</a></span>|<span>有问题和bug请直接联系作者(<a target=\'_blank\' href=\'http://wpa.qq.com/msgrd?v=3&uin=914466480&site=qq&menu=yes\'>QQ：914466480</a>)</span>");
document.writeln("</div>");
</script>
<link rel="stylesheet" type="text/css" href="<?php echo $bloghost?>zb_users/plugin/faviconapi/style/main.css"> 
<script>AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/faviconapi/logo.png'; ?>");</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';    				 	  
RunTime();    		  	  	
?>