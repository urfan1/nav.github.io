<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php  echo $title;  ?></title>
<meta name="csrfToken" content="<?php  echo $zbp->GetCSRFToken();  ?>" />
<meta name="csrfExpiration" content="<?php  echo $zbp->csrfExpiration;  ?>" />
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/login_1.css">
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/md5.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_admin_js_add.php"></script>

</head>
<body>
<canvas class="cavs" width="1575" height="1337"></canvas>

<div class="loginmain">
    <div class="login-title">
        <span>管理员登录</span>
    </div>
<form method="post" action="#" class="form" id="form1">
	<?php  echo $csrfToken;  ?>
    <div class="login-con">
        <div class="login-user">
            <div class="icon">
                <img src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/img/cd-icon-username.png" alt="">
            </div>
            <input type="text" id="edtUserName" name="edtUserName" placeholder="<?php  echo $lang['msg']['username'];  ?>" autocomplete="off" value="">
        </div>
        <div class="login-pwd">
            <div class="icon">
                <img src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/img/cd-icon-password.png" alt="">
            </div>
            <input type="password" id="edtPassWord" name="edtPassWord" placeholder="<?php  echo $lang['msg']['password'];  ?>" autocomplete="off" value="">
        </div>
        <?php if ($G2Fa !=='') { ?>
        <div class="login-yan">
            <div class="icon">
                <img src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/img/yan.png" alt="">
            </div>
            <?php  echo $G2Fa;  ?>
        </div>
        <?php } ?>
        <div class="login-btn">
			<input type="hidden" name="username" id="username" value="" />
            <input type="hidden" name="password" id="password" value="" />
            <input type="hidden" name="savedate" id="savedate" value="1" />
			<input id="btnPost" name="btnPost" type="submit" value="<?php  echo $lang['msg']['login'];  ?>" class="btn" />
        </div>
    </div>
</form>
</div>

<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/ban.js"></script>
</body>
</html>