<!DOCTYPE html>
<html lang="zh-CN" >
<head>
<meta charset="UTF-8">
<title><?php  echo $title;  ?></title>

<meta name="csrfToken" content="<?php  echo $zbp->GetCSRFToken();  ?>" />
<meta name="csrfExpiration" content="<?php  echo $zbp->csrfExpiration;  ?>" />
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/md5.js"></script>
<link rel='stylesheet' href='<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/bootstrap.min.css'>
<!---图标库--->
<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/login_3.css">
<style>
	#verfiycode {
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    height: 30px!important;
    width: auto!important;
}
</style>
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>登录</span><span>注册</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log">
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">登录</h4>
						                    <form method="post" action="#" class="form" id="form1">
						                    	<?php  echo $csrfToken;  ?>
											<div class="form-group">
												<input type="text" class="form-style"  id="edtUserName" name="edtUserName" placeholder="<?php  echo $lang['msg']['username'];  ?>" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" class="form-style" id="edtPassWord" name="edtPassWord" placeholder="<?php  echo $lang['msg']['password'];  ?>" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<?php if ($G2Fa !=='') { ?>
											<div class="form-group mt-2">
												<input type="text" class="form-style" id="googleauth" name="googleauth" placeholder="两步验证" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<?php } ?>
											<p class="form-check mb-0 mt-4 text-justify"><input type="checkbox" name="chkRemember" id="chkRemember"><label for="chkRemember"><?php  echo $lang['msg']['stay_signed_in'];  ?></label></p>
			                                <input type="hidden" name="username" id="username" value="" />
                                            <input type="hidden" name="password" id="password" value="" />
                                            <input type="hidden" name="savedate" id="savedate" value="1" />
											<input class="btn mt-4" id="btnPost" type="submit" name="btnPost" value="<?php  echo $lang['msg']['login'];  ?>">
			      				        </form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">注册</h4>
			      				            <form method="post" action="#" class="form" id="form2">
			      				            	<?php  echo $csrfToken;  ?>
											<div class="form-group">
												<input type="text" name="reg_name" class="form-style" placeholder="名称" id="reg_name" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="reg_email" class="form-style" placeholder="邮箱" id="reg_email" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" name="reg_password" class="form-style" placeholder="密码" id="reg_password" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" name="reg_repassword" class="form-style" placeholder="确认密码" id="reg_repassword" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<?php if ($homepage !=='') { ?>
											<div class="form-group mt-2">
												<input type="password" name="reg_homepage" class="form-style" placeholder="网址" id="reg_homepage" autocomplete="off">
												<i class="input-icon uil uil-home"></i>
											</div>
											<?php } ?>
											<?php  echo $invitecode;  ?>
											<?php if ($verifycode !=='') { ?>
											<div class="form-group mt-2">
												<input type="password" name="reg_verifycode" class="form-style" placeholder="验证码" id="reg_verifycode" autocomplete="off">
												<i class="input-icon uil uil-comment-verify"></i>
												<img id="verfiycode" src="<?php  echo $zbp->validcodeurl;  ?>&amp;id=RegPage" alt="" title="" onclick="javascript:this.src=\'<?php  echo $zbp->validcodeurl;  ?>&amp;id=RegPage&amp;tm=\'+Math.random();"/>
											</div>
											<?php } ?>
											<input class="btn mt-4" type="submit" value="注册" onclick="return RegPage()" />
			      			          	</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/NewLogin.php"></script>	
</body>
</html>
