<?php
require '../../../../../zb_system/function/c_system_base.php';

echo <<<EOD
$("#btnPost").click(function(){

    var strUserName=$("#edtUserName").val();
    var strPassWord=$("#edtPassWord").val();
    var strSaveDate=$("#savedate").val()

    if (strUserName=== "" || strPassWord === ""){
        alert("{$lang['error']['66']}");
        return false;
    }

    $("#edtUserName").remove();
    $("#edtPassWord").remove();
    $("#chkRemember").remove();

    $("#form1").attr("action","{$zbp->host}zb_system/cmd.php?act=verify");
    $("#username").val(strUserName);
    $("#password").val(MD5(strPassWord));
    $("#savedate").val(strSaveDate);
})

$("#chkRemember").click(function(){
    $("#savedate").attr("value", $("#chkRemember").prop("checked") == true ? 30 : 1);
})

EOD;

if($zbp->CheckPlugin('RegPage')) {
echo <<<EOD
function RegPage(){
	
	$.post(bloghost+'zb_users/plugin/RegPage/reg.php',
		{
		"name":$("input[name='reg_name']").val(),
		"password":$("input[name='reg_password']").val(),
		"repassword":$("input[name='reg_repassword']").val(),
		"email":$("input[name='reg_email']").val(),
		"homepage":$("input[name='reg_homepage']").val(),
		"invitecode":$("input[name='reg_invitecode']").val(),
		"verifycode":$("input[name='reg_verifycode']").val(),
		"hash":$("input[name='reg_hash']").val(),
		},
		function(data){
			var s =data;
			if((s.search("faultCode")>0)&&(s.search("faultString")>0))
			{
				alert(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
				$("#reg_verfiycode").click();
			}
			else{
				var s =data;
				alert(s);
				window.location=bloghost+'zb_system/login.php';
			}
		}
	);
	
}

EOD;
}
echo <<<EOD
console.log("%c%c网站名称%c菜鸟建站","line-height:28px;","line-height:28px;padding:4px;background:#222;color:#fff;font-size:16px;margin-right:15px","color:#3fa9f5;line-height:28px;font-size:16px;");
console.log("%c%c网站地址%chttp://www.newbii.cn","line-height:28px;","line-height:28px;padding:4px;background:#222;color:#fff;font-size:16px;margin-right:15px","color:#ff9900;line-height:28px;font-size:16px;");
console.log("%c%c企鹅号码%c277-020-8088(zblog主题插件与定制)","line-height:28px;","line-height:28px;padding:4px;background:#222;color:#fff;font-size:16px;margin-right:15px","color:#008000;line-height:28px;font-size:16px;");

          window.onload = function(){
            //屏蔽键盘事件
            document.onkeydown = function (){
              var e = window.event || arguments[0];
              /*延迟，兼容FF浏览器  */
              if(e.keyCode== 83 && e.ctrlKey){
                setTimeout(function(){
                  alert('整理不易，不要另存哦');
                },1);
                return false;
              }else if(e.keyCode == 123){
                //F12
                setTimeout(function(){
                  alert('亲，你想干嘛,不要做坏事哦');
                },1);
                return false;
                //Ctrl+Shift+I
              }else if((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)){
                setTimeout(function(){
                  alert('亲，你想干嘛,不要做坏事哦');
                },1);
                return false;
                //Shift+F10
              }else if((e.shiftKey) && (e.keyCode == 121)){
                setTimeout(function(){
                  alert('亲，你想干嘛,不要做坏事哦');
                },1);
                return false;
                //Ctrl+U
              }else if((e.ctrlKey) && (e.keyCode == 85)){
                setTimeout(function(){
                  alert('亲，你想干嘛,不要做坏事哦');
                },1);
                return false;
              }
            };
            //屏蔽鼠标右键
            window.document.oncontextmenu = function (){
              alert('亲，你想干嘛,不要做坏事哦');
              return false;
            }

          }
EOD;
?>