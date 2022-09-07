<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{$title}</title>
<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_1.css">
<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>

</head>
<body>
<canvas class="cavs" width="1575" height="1337"></canvas>

<div class="loginmain">
    <div class="login-title">
        <span>管理员登录</span>
    </div>
<form method="post" action="#" class="form" id="form1">
	{$csrfToken}
    <div class="login-con">
        <div class="login-user">
            <div class="icon">
                <img src="{$host}zb_users/plugin/New_Login/static/img/cd-icon-username.png" alt="">
            </div>
            <input type="text" id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" autocomplete="off" value="">
        </div>
        <div class="login-pwd">
            <div class="icon">
                <img src="{$host}zb_users/plugin/New_Login/static/img/cd-icon-password.png" alt="">
            </div>
            <input type="password" id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" autocomplete="off" value="">
        </div>
        {if $G2Fa !==''}
        <div class="login-yan">
            <div class="icon">
                <img src="{$host}zb_users/plugin/New_Login/static/img/yan.png" alt="">
            </div>
            {$G2Fa}
        </div>
        {/if}
        <div class="login-btn">
			<input type="hidden" name="username" id="username" value="" />
            <input type="hidden" name="password" id="password" value="" />
            <input type="hidden" name="savedate" id="savedate" value="1" />
			<input id="btnPost" name="btnPost" type="submit" value="{$lang['msg']['login']}" class="btn" />
        </div>
    </div>
</form>
</div>

<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<script src="{$host}zb_users/plugin/New_Login/static/js/ban.js"></script>
</body>
</html>