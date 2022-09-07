<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<meta name="csrfToken" content="{$zbp->GetCSRFToken()}" />
<meta name="csrfExpiration" content="{$zbp->csrfExpiration}" />
<script src="{$host}zb_system/script/jquery-2.2.4.min.js"></script>
<script src="{$host}zb_system/script/zblogphp.js"></script>
<script src="{$host}zb_system/script/md5.js"></script>
<script src="{$host}zb_system/script/c_admin_js_add.php"></script>
<link rel="stylesheet" href="{$host}zb_users/plugin/New_Login/static/css/login_14.css">

  
</head>

<body>
   <main>
        <form method="post" action="#" class="form" id="form1">
        	{$csrfToken}
            <div class="form__cover"></div>
            <div class="form__loader">
                <div class="spinner active">
                    <svg class="spinner__circular" viewBox="25 25 50 50">
                        <circle class="spinner__path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
                    </svg>
                </div>
            </div>
            <div class="form__content">
                <h1>{$name}</h1>
                <div class="styled-input">
                    <input type="text" class="styled-input__input" id="edtUserName" name="edtUserName" placeholder="">
                    <div class="styled-input__placeholder">
                        <span class="styled-input__placeholder-text">{$lang['msg']['username']}</span>
                    </div>
                    <div class="styled-input__circle"></div>
                </div><div class="styled-input">
                     <input type="password" class="styled-input__input" id="edtPassWord" name="edtPassWord" placeholder="">
                    <div class="styled-input__placeholder">
                        <span class="styled-input__placeholder-text">{$lang['msg']['password']}</span>
                    </div>
                    <div class="styled-input__circle"></div>
                </div>
                {if $G2Fa !==''}
                <div class="styled-input">
                     <input type="text" class="styled-input__input" id="googleauth" name="googleauth" placeholder="">
                    <div class="styled-input__placeholder">
                        <span class="styled-input__placeholder-text">两步验证</span>
                    </div>
                    <div class="styled-input__circle"></div>
                </div>
                {/if}
			    <input type="hidden" name="username" id="username" value="" />
                <input type="hidden" name="password" id="password" value="" />
                <input type="hidden" name="savedate" id="savedate" value="1" />
                <button type="submit" class="styled-button" id="btnPost">
                    <span class="styled-button__real-text-holder">
                        <span class="styled-button__real-text">{$lang['msg']['login']}</span>
                        <span class="styled-button__moving-block face">
                            <span class="styled-button__text-holder">
                                <span class="styled-button__text">{$lang['msg']['login']}</span>
                            </span>
                        </span><span class="styled-button__moving-block back">
                            <span class="styled-button__text-holder">
                                <span class="styled-button__text">{$lang['msg']['login']}</span>
                            </span>
                        </span>
                    </span>
                </button>
            </div>

        </form>
    </main>


<script src="{$host}zb_users/plugin/New_Login/static/js/NewLogin.php"></script>
<script  src="{$host}zb_users/plugin/New_Login/static/js/index.js"></script>

</body>
</html>