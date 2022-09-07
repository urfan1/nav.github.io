<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>{$title}</title>
<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/normalize.css">
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_9.css">
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/sign-up-login.css">
<link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/inputEffect.css" />
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/tooltips.css" />
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/spop.min.css" />

<script src="{$host}zb_users/plugin/New_Login/static/js/snow.js"></script>
<script src="{$host}zb_users/plugin/New_Login/static/js/jquery.pure.tooltips.js"></script>
<script src="{$host}zb_users/plugin/New_Login/static/js/spop.min.js"></script>

<script>	
	(function() {
		// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
		if (!String.prototype.trim) {
			(function() {
				// Make sure we trim BOM and NBSP
				var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
				String.prototype.trim = function() {
					return this.replace(rtrim, '');
				};
			})();
		}

		[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
			// in case the input is already filled..
			if( inputEl.value.trim() !== '' ) {
				classie.add( inputEl.parentNode, 'input--filled' );
			}

			// events:
			inputEl.addEventListener( 'focus', onInputFocus );
			inputEl.addEventListener( 'blur', onInputBlur );
		} );

		function onInputFocus( ev ) {
			classie.add( ev.target.parentNode, 'input--filled' );
		}

		function onInputBlur( ev ) {
			if( ev.target.value.trim() === '' ) {
				classie.remove( ev.target.parentNode, 'input--filled' );
			}
		}
	})();
	
	$(function() {	
		$('#login #edtPassWord').focus(function() {
			$('.login-owl').addClass('password');
		}).blur(function() {
			$('.login-owl').removeClass('password');
		});
		$('#login #reg_password').focus(function() {
			$('.register-owl').addClass('password');
		}).blur(function() {
			$('.register-owl').removeClass('password');
		});
		$('#login #reg_repassword').focus(function() {
			$('.register-owl').addClass('password');
		}).blur(function() {
			$('.register-owl').removeClass('password');
		});
	});
	
	function goto_register(){
		$("#tab-2").prop("checked",true);
	}
	
	function goto_login(){
		$("#tab-1").prop("checked",true);
	}
	
	function goto_forget(){
		$("#tab-3").prop("checked",true);
	}
</script>
<style type="text/css">
html{width: 100%; height: 100%;}

body{

	background-repeat: no-repeat;

	background-position: center center #2D0F0F;

	background-color: #00BDDC;

	background-image: url({$host}zb_users/plugin/New_Login/static/img/snow.jpg);

	background-size: 100% 100%;

}

.snow-container { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 100001; }

</style>
</head>
<body>
	<!-- 雪花背景 -->
	<div class="snow-container"></div>
	<!-- 登录控件 -->
	<div id="login">
		<input id="tab-1" type="radio" name="tab" class="sign-in hidden" checked />
		<input id="tab-2" type="radio" name="tab" class="sign-up hidden" />
		<input id="tab-3" type="radio" name="tab" class="sign-out hidden" />
		<div class="wrapper">
			<!-- 登录页面 -->
			<div class="login sign-in-htm">
				<form class="container offset1 loginform" method="post" action="#" id="form1">
					{$csrfToken}
					<!-- 猫头鹰控件 -->
					<div id="owl-login" class="login-owl">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad input-container">
						<section class="content">
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" autocomplete="off" id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" tabindex="1" maxlength="15" />
								<label class="input__label input__label--hideo" for="edtUserName">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="password" id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" tabindex="2" maxlength="15"/>
								<label class="input__label input__label--hideo" for="edtPassWord">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							{if $G2Fa !==''}  
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" id="googleauth" name="googleauth" placeholder="两步验证" tabindex="2" maxlength="6"/>
								<label class="input__label input__label--hideo" for="googleauth">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							{/if}
						</section>
					</div>
					<input type="hidden" name="username" id="username" value="" />
					<input type="hidden" name="password" id="password" value="" />
					<input type="hidden" name="savedate" id="savedate" value="1" />
					<div class="form-actions">
						<div class="btn pull-left btn-link text-muted"><input type="checkbox" name="chkRemember" id="chkRemember" class="pull-left" tabindex="98"><label for="chkRemember" class="pull-left text-muted">{$lang['msg']['stay_signed_in']}</label></div>
						<a tabindex="5" class="btn btn-link text-muted" onClick="goto_register()">注册</a>
						<input class="btn btn-primary" id="btnPost" name="btnPost" type="submit" value="{$lang['msg']['login']}" 
							style="color:white;"/>
					</div>
				</form>
			</div>
			<!-- 忘记密码页面 -->
			<div class="login sign-out-htm">
				<form action="#" method="post" class="container offset1 loginform">
					{$csrfToken}
					<!-- 猫头鹰控件 -->
					<div id="owl-login" class="forget-owl">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad input-container">
						<section class="content">
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" id="forget-username" autocomplete="off" placeholder="请输入用户名"/>
								<label class="input__label input__label--hideo" for="forget-username">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" id="forget-code" autocomplete="off" placeholder="请输入注册码"/>
								<label class="input__label input__label--hideo" for="forget-code">
									<i class="fa fa-fw fa-wifi icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="password" id="forget-password" placeholder="请重置密码" />
								<label class="input__label input__label--hideo" for="forget-password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
						</section>
					</div>
					<div class="form-actions">
						<a class="btn pull-left btn-link text-muted" onClick="goto_login()">返回登录</a>
						<input class="btn btn-primary" type="button" onClick="forget()" value="重置密码" 
							style="color:white;"/>
					</div>
				</form>
			</div>
			<!-- 注册页面 -->
			<div class="login sign-up-htm">
				<form method="post" action="#" id="form2" class="container offset1 loginform">
					{$csrfToken}
					<!-- 猫头鹰控件 -->
					<div id="owl-login" class="register-owl">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad input-container">
						<section class="content">
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" id="reg_name" 
									autocomplete="off" name="reg_name" placeholder="请输入用户名" maxlength="15"/>
								<label class="input__label input__label--hideo" for="reg_name">
									<i class="fa fa-fw fa-user icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="email" name="reg_email" id="reg_email" placeholder="请输入邮箱" maxlength="15"/>
								<label class="input__label input__label--hideo" for="reg_email">
									<i class="fa fa-fw fa-envelope-o icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="password" name="reg_password" id="reg_password" placeholder="请输入密码" maxlength="15"/>
								<label class="input__label input__label--hideo" for="reg_password">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="password" name="reg_repassword" id="reg_repassword" placeholder="请确认密码" maxlength="15"/>
								<label class="input__label input__label--hideo" for="reg_repassword">
									<i class="fa fa-fw fa-lock icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							{if $homepage !==''}
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="password" name="reg_homepage" id="reg_homepage" placeholder="请输入网址" maxlength="15"/>
								<label class="input__label input__label--hideo" for="reg_homepage">
									<i class="fa fa-fw fa-home icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							{/if}
							{$invitecode}
							{if $verifycode !==''}
							<span class="input input--hideo">
								<input class="input__field input__field--hideo" type="text" name="reg_verifycode" id="reg_verifycode" autocomplete="off" placeholder="请输入注册码"/>
								<img id="verfiycode" src="{$zbp->validcodeurl}&amp;id=RegPage" alt="" title="" onclick="javascript:this.src=\'{$zbp->validcodeurl}&amp;id=RegPage&amp;tm=\'+Math.random();"/>
								<label class="input__label input__label--hideo" for="reg_verifycode">
									<i class="fa fa-fw fa-wifi icon icon--hideo"></i>
									<span class="input__label-content input__label-content--hideo"></span>
								</label>
							</span>
							{/if}
						</section>
					</div>
					<div class="form-actions">
						<a class="btn pull-left btn-link text-muted" onClick="goto_login()">返回登录</a>
						<input class="btn btn-primary" type="button" onClick="return RegPage()" value="注册" 
							style="color:white;"/>
					</div>
				</form>
			</div>
		</div>
	</div>
	

<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
</body>
</html>