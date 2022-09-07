<!DOCTYPE html>
<html>
<head>
<title>{$title}</title>
<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_12.css">

</head>
<body>

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form action="#" method="post" id="form1"> 
				{$csrfToken}
					<input class="text" type="text" id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" required="">
					<input class="text" type="password" id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" required="">
					{$G2Fa}
					<div class="wthree-text"> 
						<ul> 
							<li>
								<label class="anim">
									<input type="checkbox" name="chkRemember" id="chkRemember" class="" required="">
									<span>{$lang['msg']['stay_signed_in']}</span> 
								</label> 
							</li>
						</ul>
						<div class="clear"> </div>
					</div>   
			        <input type="hidden" name="username" id="username" value="" />
                    <input type="hidden" name="password" id="password" value="" />
                    <input type="hidden" name="savedate" id="savedate" value="1" />
					<input id="btnPost" name="btnPost" type="submit" value="{$lang['msg']['login']}">
				</form>
				<p>创建一个账号? <a href="#"> 立即注册!</a></p>
			</div>	 
		</div>	
		<!-- copyright -->
		<div class="w3copyright-agile">
		</div>
		<!-- //copyright -->
		<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>	
	<!-- //main --> 

<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
</body>
</html>
