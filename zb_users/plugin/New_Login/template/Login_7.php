<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>{$title}</title>
    <meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
    <meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
    <script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
    <script src="{$host}zb_system/script/zblogphp.js"></script>
    <script src="{$host}zb_system/script/md5.js"></script>
    <script src="{$host}zb_system/script/c_admin_js_add.php"></script>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_7.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//maxcdn.bootstrapcdn.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- bg effect -->
	<div id="bg">
		<canvas></canvas>
		<canvas></canvas>
		<canvas></canvas>
	</div>
	<!-- //bg effect -->
	<!-- title -->
	<h1>{$name}</h1>
	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
		<form action="#" method="post" id="form1">
			{$csrfToken}
			<h2>欢迎回来
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-user"></i>
					用户名
				</label>
				<input type="text" id="edtUserName" name="edtUserName" placeholder="{$lang['msg']['username']}" class="input" />
			</div>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					密码
				</label>
				<input type="password" id="edtPassWord" name="edtPassWord" placeholder="{$lang['msg']['password']}" class="input" />
			</div>
            {if $G2Fa !==''}  	
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					两步验证
				</label>
				<input type="text" id="googleauth" name="googleauth" placeholder="两步验证" autocomplete="off" class="login_txtbx" />
			</div>
            {/if}
	    	<input type="hidden" name="username" id="username" value="" />
            <input type="hidden" name="password" id="password" value="" />
            <input type="hidden" name="savedate" id="savedate" value="1" />
			<!-- checkbox -->
			<div class="wthree-text">
				<ul>
					<li>
						<label class="anim">
							<input type="checkbox" name="chkRemember" class="" id="chkRemember" required=""/>
							<span>{$lang['msg']['stay_signed_in']}</span>
						</label>
					</li>
				</ul>
			</div>
			<!-- //checkbox -->
			<input id="btnPost" name="btnPost" type="submit" value="{$lang['msg']['login']}" />
		</form>
	</div>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer">
	</div>
	<!-- //copyright -->

	<!-- effect js -->
	<script src="{$host}zb_users/plugin/New_Login/static/js/canva_moving_effect.js"></script>
	<!-- //effect js -->

<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
</body>

</html>