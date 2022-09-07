<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>{$title}</title>
<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_5.css">
</head>

<body>

<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">欢迎回来</h2>
      <h4 class="animation a2">使用电邮及密码登入你的帐户</h4>
    </div>
    <form action="#" method="post" id="form1">
    	{$csrfToken}
    <div class="form">
      <input type="text" id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" class="form-field animation a3">
      <input type="password" id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" class="form-field animation a4">
      <p class="animation a5"><input type="checkbox" name="chkRemember" id="chkRemember"  tabindex="98" /><label for="chkRemember">{$lang['msg']['stay_signed_in']}</label></p>
      <input type="hidden" name="username" id="username" value="" />
      <input type="hidden" name="password" id="password" value="" />
      <input type="hidden" name="savedate" id="savedate" value="1" />
      <button class="animation a6" id="btnPost">登录</button>
    </div>
      </form>
  </div>
  <div class="right"></div>
</div>
<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
</body>
</html>
