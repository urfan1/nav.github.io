<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>{$title}</title>
<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" type="text/css" href="{$host}zb_users/plugin/New_Login/static/css/login_8.css" />
<link rel="stylesheet" type="text/css" href="{$host}zb_users/plugin/New_Login/static/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="{$host}zb_users/plugin/New_Login/static/css/demo.css" />
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
<style>
	input::-webkit-input-placeholder{
		color:rgba(0, 0, 0, 0.726);
	}
	input::-moz-placeholder{   /* Mozilla Firefox 19+ */
		color:rgba(0, 0, 0, 0.726);
	}
	input:-moz-placeholder{    /* Mozilla Firefox 4 to 18 */
		color:rgba(0, 0, 0, 0.726);
	}
	input:-ms-input-placeholder{  /* Internet Explorer 10-11 */ 
		color:rgba(0, 0, 0, 0.726);
	}
</style>
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>{$name}</h3>
						<form action="#" method="post" id="form1">
							{$csrfToken}
							<div class="input_outer">
								<span class="u_user"></span>
								<input id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" class="text" style="color: #000000 !important" type="text">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" class="text" style="color: #000000 !important; position:absolute; z-index:100;" type="password">
							</div>
    						 {if $G2Fa !==''}  	
							<div class="input_outer">
								<span class="us_uer"></span>
     						  <input type="text" id="googleauth" name="googleauth" placeholder="两步验证" autocomplete="off" class="login_txtbx">
     						 </div> 
     						 {/if}
							<input type="hidden" name="username" id="username" value="" />
     						<input type="hidden" name="password" id="password" value="" />
      						<input type="hidden" name="savedate" id="savedate" value="1" />
							<div id="LOGIN" class="mb2"><button class="act-but submit" id="btnPost" type="submit" style="color: #FFFFFF">{$lang['msg']['login']}</button></div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="{$host}zb_users/plugin/New_Login/static/js/TweenLite.min.js"></script>
		<script src="{$host}zb_users/plugin/New_Login/static/js/EasePack.min.js"></script>
		<script src="{$host}zb_users/plugin/New_Login/static/js/rAF.js"></script>
		<script src="{$host}zb_users/plugin/New_Login/static/js/demo-1.js"></script>
		<script src="{$host}zb_users/plugin/New_Login/static/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
		<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<div style="text-align:center;">
</div>
	</body>
</html>