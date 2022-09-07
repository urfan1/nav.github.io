<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title><?php  echo $title;  ?></title>
<meta name="csrfToken" content="<?php  echo $zbp->GetCSRFToken();  ?>" />
<meta name="csrfExpiration" content="<?php  echo $zbp->csrfExpiration;  ?>" />
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/md5.js"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/css/login_11.css">
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="js/jquery.js"></script>
<script src="js/verificationNumbers.js" tppabs="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/verificationNumbers.js"></script>
<script src="js/Particleground.js" tppabs="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
});
function showCheck(a){
	var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
	ctx.clearRect(0,0,1000,1000);
	ctx.font = "80px 'Microsoft Yahei'";
	ctx.fillText(a,0,100);
	ctx.fillStyle = "white";
}
var code ;    
function createCode(){       
    code = "";      
    var codeLength = 4;
    var selectChar = new Array(1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','j','k','l','m','n','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');      
    for(var i=0;i<codeLength;i++) {
       var charIndex = Math.floor(Math.random()*60);      
      code +=selectChar[charIndex];
    }      
    if(code.length != codeLength){      
      createCode();      
    }
    showCheck(code);
}
</script>
</head>
<body>
<form method="post" action="#" class="form" id="form1">
	<?php  echo $csrfToken;  ?>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <dd class="user_icon">
  <input type="text" id="edtUserName" name="edtUserName" placeholder="<?php  echo $lang['msg']['username'];  ?>" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" id="edtPassWord" name="edtPassWord" placeholder="<?php  echo $lang['msg']['password'];  ?>" class="login_txtbx"/>
 </dd>
 <?php if ($G2Fa !=='') { ?>
 <dd class="val_icon">
  <input type="text" id="googleauth" name="googleauth" placeholder="两步验证" class="login_txtbx"/>
 </dd>
 <?php } ?>
 <dd class="checkbox"><input type="checkbox" name="chkRemember" id="chkRemember" tabindex="98"><label for="chkRemember" style="color: white;"><?php  echo $lang['msg']['stay_signed_in'];  ?></label></dd>
 <dd>
  <input type="hidden" name="username" id="username" value="" />
  <input type="hidden" name="password" id="password" value="" />
  <input type="hidden" name="savedate" id="savedate" value="1" />
  <input type="submit" value="<?php  echo $lang['msg']['login'];  ?>" id="btnPost" class="submit_btn"/>
 </dd>
</dl>
</form>
<script src="<?php  echo $host;  ?>zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
</body>
</html>
