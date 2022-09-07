
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>{$title}</title>

<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_16.css">

<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
</head>

<body>

    <div class="dwo">
        <div class="panda">
            <div class="ear"></div>
            <div class="face">
                <div class="eye-shade"></div>
                <div class="eye-white">
                    <div class="eye-ball"></div>
                </div>
                <div class="eye-shade rgt"></div>
                <div class="eye-white rgt">
                    <div class="eye-ball"></div>
                </div>
                <div class="nose"></div>
                <div class="mouth"></div>
            </div>
            <div class="body"> </div>
            <div class="foot">
                <div class="finger"></div>
            </div>
            <div class="foot rgt">
                <div class="finger"></div>
            </div>
        </div>
        <form method="post" action="#" class="form" id="form1">
        	{$csrfToken}
            <div class="hand"></div>
            <div class="hand rgt"></div>
            <h1>用户登录</h1>
            <div class="form-group">
                <input required="required" id="edtUserName" name="edtUserName" class="form-control">
                <label class="form-label">用户名</label>
            </div>
            <div class="form-group">
                <input type="password" id="edtPassWord" name="edtPassWord" required="required" class="form-control">
                <label class="form-label">密码</label>
                <p class="checkbox"><input type="checkbox" name="chkRemember" id="chkRemember" tabindex="98"><label for="chkRemember">{$lang['msg']['stay_signed_in']}</label></p>
				<input type="hidden" name="username" id="username" value="" />
				<input type="hidden" name="password" id="password" value="" />
				<input type="hidden" name="savedate" id="savedate" value="1" />
                <p class="alert">验证未通过！</p>
                <button class="btn" id="btnPost">登 录</button>
            </div>
        </form>
    </div>

<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<script>
$('#edtPassWord').focusin(function () {
    $('form').addClass('up')
})
$('#edtPassWord').focusout(function () {
    $('form').removeClass('up')
})
// 眼睛移动
$(document).on('mousemove', function (event) {
    var dw = $(document).width() / 15
    var dh = $(document).height() / 15
    var x = event.pageX / dw
    var y = event.pageY / dh
    $('.eye-ball').css({
        width: x,
        height: y
    })
})
</script>
</body>

</html>