<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php  echo $title;  ?></title>

<meta name="csrfToken" content="<?php  echo $zbp->GetCSRFToken();  ?>" />
<meta name="csrfExpiration" content="<?php  echo $zbp->csrfExpiration;  ?>" />
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/login_17.css">

<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/md5.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_admin_js_add.php"></script>

</head>
<body>

<div class="container">
  <form method="post" action="#" class="form" id="form1">
	<?php  echo $csrfToken;  ?>
    <p>欢迎光临</p>
    <input type="text" id="edtUserName" name="edtUserName" placeholder="用户名"><br>
    <input type="password" id="edtPassWord" name="edtPassWord" placeholder="密码"><br>
    <input type="hidden" name="username" id="username" value="" />
    <input type="hidden" name="password" id="password" value="" />
    <input type="hidden" name="savedate" id="savedate" value="1" />
    <input type="submit" value="登录" id="btnPost"><br>
  </form>

  <div class="drops">
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </div>
</div>

<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/NewLogin.php"></script>

</body>
</html>
