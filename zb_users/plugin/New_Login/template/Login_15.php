<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>{$title}</title>

<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_15.css">

<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
<script src="{$host}zb_users/plugin/New_Login/static/js/vector.js"></script>

</head>
<body>

<div id="container">
	<div id="output">
		<div class="containerT">
			<h1>用户登录</h1>
			<form class="form" id="form1" method="post" action="#" class="form">
				{$csrfToken}
				<input type="text" placeholder="用户名" name="edtUserName" id="edtUserName">
				<input type="password" placeholder="密码"  name="edtPassWord" id="edtPassWord">
				<input type="hidden" name="username" id="username" value="" />
				<input type="hidden" name="password" id="password" value="" />
				<input type="hidden" name="savedate" id="savedate" value="1" />
				<button type="submit" id="btnPost">登录</button>
				<div id="prompt" class="prompt"></div>
			</form>
		</div>
	</div>
</div>

<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<script type="text/javascript">
    $(function(){
        Victor("container", "output");   //登陆背景函数
        $("#edtUserName").focus();
        $(document).keydown(function(event){
            if(event.keyCode==13){
                $("#btnPost").click();
            }
        });
    });
</script>

</body>
</html>