<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title><?php  echo $title;  ?></title>
<meta name="csrfToken" content="<?php  echo $zbp->GetCSRFToken();  ?>" />
<meta name="csrfExpiration" content="<?php  echo $zbp->csrfExpiration;  ?>" />
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/md5.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" type="text/css" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/login_10.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/component.css" />
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3><?php  echo $name;  ?></h3>
						<form action="#" method="post" id="form1">
							<?php  echo $csrfToken;  ?>
							<div class="input_outer">
								<span class="u_user"></span>
								<input class="text" style="color: #FFFFFF !important" type="text" id="edtUserName" name="edtUserName" placeholder="<?php  echo $lang['msg']['username'];  ?>">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" id="edtPassWord" name="edtPassWord" placeholder="<?php  echo $lang['msg']['password'];  ?>">
							</div>
							<?php if ($G2Fa !=='') { ?>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="text" id="googleauth" name="googleauth" placeholder="两步验证">
							</div>
							<?php } ?>
							<input type="hidden" name="username" id="username" value="" />
            				<input type="hidden" name="password" id="password" value="" />
            				<input type="hidden" name="savedate" id="savedate" value="1" />
							<div class="mb2"><button class="act-but submit"  id="btnPost" type="submit" style="color: #FFFFFF"><?php  echo $lang['msg']['login'];  ?></button></div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/TweenLite.min.js"></script>
		<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/EasePack.min.js"></script>
		<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/rAF.js"></script>
		<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/demo-1.js"></script>


<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/NewLogin.php"></script>		
</body>
</html>