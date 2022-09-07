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
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_0.css">
<style>
#verfiycode {
    margin-right: -200px;
    margin-top: -66px;
    height: 30px!important;
    width: 100px!important;
}
</style>
</head>
<body>

<div class="container right-panel-active">

	<!-- Sign Up -->
	<div class="container__form container--signup">
		<form method="post" action="#" class="form" id="form2">
			{$csrfToken}
			<h2 class="form__title">注册</h2>
			<input type="text" name="reg_name" placeholder="用户名" class="input" />
			<input type="email" name="reg_email" placeholder="邮箱" class="input" />
			<input type="password" name="reg_password" placeholder="密码" class="input" />
			<input type="password" name="reg_repassword" placeholder="确认密码" class="input" />
			{$homepage}
			{$invitecode}
			{$verifycode}
			<input type="submit" value="注册"  onclick="return RegPage()" class="btn" />
		</form>
	</div>

	<!-- Sign In -->
	<div class="container__form container--signin">
		<form method="post" action="#" class="form" id="form1">
			{$csrfToken}
			<h2 class="form__title">登录</h2>
			<input type="text" id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" class="input" />
			<input type="password" id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" class="input" />
			{$G2Fa}
			<div><input type="checkbox" name="chkRemember" id="chkRemember"  tabindex="98" /><label for="chkRemember">{$lang['msg']['stay_signed_in']}</label></div>
			<input type="hidden" name="username" id="username" value="" />
            <input type="hidden" name="password" id="password" value="" />
            <input type="hidden" name="savedate" id="savedate" value="1" />
			<input id="btnPost" name="btnPost" type="submit" value="{$lang['msg']['login']}" class="btn" />
		</form>
	</div>

	<!-- Overlay -->
	<div class="container__overlay">
		<div class="overlay">
			<div class="overlay__panel overlay--left">
				<button class="btn" id="signIn">登录</button>
			</div>
			<div class="overlay__panel overlay--right">
				<button class="btn" id="signUp">注册</button>
			</div>
		</div>
	</div>
</div>
<script>
const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
const container = document.querySelector(".container");

signInBtn.addEventListener("click", () => {
	container.classList.remove("right-panel-active");
});

signUpBtn.addEventListener("click", () => {
	container.classList.add("right-panel-active");
});

</script>
<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<!--<script  src="{$host}zb_users/plugin/New_Login/static/js/login_0.js"></script>-->
</body>
</html>
