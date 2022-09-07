<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>{$title}</title>
<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_6.css">
</head>

<body>
<img src="{$host}zb_users/plugin/New_Login/static/img/bgImg.jpg" class="bgImg" />
<div class="content">
	<div class="bidTitle">{$name}</div>
	<form method="post" action="#" class="form" id="form1">
		{$csrfToken}
	<div class="logCon">
		<div class="line"><span>账号:</span>
		<input class="bt_input" type="text" id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" /></div>
		<div class="line"><span>密码:</span>
		<input class="bt_input" type="password" id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" /></div>
		{if $G2Fa !==''} 
		<div class="line"><span>两步验证:</span>
		<input class="bt_input" type="text" id="googleauth" name="googleauth" placeholder="两步验证" /></div>
		{/if}
		<div class="line"><input type="checkbox" name="chkRemember" id="chkRemember" tabindex="98"><label for="chkRemember">{$lang['msg']['stay_signed_in']}</label></div>
		<input type="hidden" name="username" id="username" value="" />
        <input type="hidden" name="password" id="password" value="" />
        <input type="hidden" name="savedate" id="savedate" value="1" />
		<button id="btnPost" type="submit" class="logingBut">{$lang['msg']['login']}</button>
	</div>
	</form>
</div>
<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
</body>
</html>