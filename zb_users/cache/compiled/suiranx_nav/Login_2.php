<!doctype html>
<html lang="zh" class="no-js">
<head>
<meta charset="UTF-8">
<title><?php  echo $title;  ?></title>
<meta name="csrfToken" content="<?php  echo $zbp->GetCSRFToken();  ?>" />
<meta name="csrfExpiration" content="<?php  echo $zbp->csrfExpiration;  ?>" />
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/md5.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/login_2.css">
</head>
<body>
<div class="bg-back"></div>
	<div style="z-index: 10000;
    position: absolute;
    top: 0;
    left:calc(50% - 244px);
		"  class="cd-user-modal is-visible"> <!-- this is the entire modal form, including the background -->
		<div class="cd-user-modal-container"> 
			<div id="cd-login" class="is-visible is-selected"> <!-- log in form -->
				<form method="post" action="#" class="cd-form form" id="form1">
					<?php  echo $csrfToken;  ?>
					<p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">账户名</label>
						<input class="full-width has-padding has-border" type="text" id="edtUserName" name="edtUserName" placeholder="<?php  echo $lang['msg']['username'];  ?>">
						<span class="cd-error-message">账户名错误</span>
					</p>
					<?php if ($G2Fa !=='') { ?>
					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">两步验证</label>
						<input class="full-width has-padding has-border" type="text" id="googleauth" name="googleauth" placeholder="两步验证">
						<span class="cd-error-message">验证错误</span>
					</p>
					
					<?php } ?>
					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">密码</label>
						<input class="full-width has-padding has-border" type="password" id="edtPassWord" name="edtPassWord" placeholder="<?php  echo $lang['msg']['password'];  ?>">
						<span class="cd-error-message">格式错误!</span>
					</p>
					<p class="fieldset">
						<input type="checkbox" name="chkRemember" id="chkRemember" checked>
						<label for="remember-me"><?php  echo $lang['msg']['stay_signed_in'];  ?></label>
					</p>
					<p class="fieldset">
			            <input type="hidden" name="username" id="username" value="" />
                        <input type="hidden" name="password" id="password" value="" />
                        <input type="hidden" name="savedate" id="savedate" value="1" />
						<input class="full-width" id="btnPost" type="submit" name="btnPost" value="<?php  echo $lang['msg']['login'];  ?>">
					</p>
				</form>
			</div> <!-- cd-login -->
		</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->

<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/NewLogin.php"></script>	
</body>
</html>