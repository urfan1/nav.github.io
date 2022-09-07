
$(function(){
	$(".submit-form .post-btn").click(function() {
		checkPost();
	});
	function checkPost(){
		$.post(bloghost+'zb_users/theme/suiranx_nav/plugin/post.php', {
			"Title":$("input[name='Title']").val(),			
			"Content":editor.getContent(),
			"token":$("input[name='token']").val(),
			"Cate":$("select[name='Cate']").val(),
			"coverimg":$("input[name='coverimg']").val(),
			"suiranx_nav_art_name":$("input[name='suiranx_nav_art_name']").val(),
			"suiranx_nav_art_url":$("input[name='suiranx_nav_art_url']").val(),
			"artkeywords":$("input[name='artkeywords']").val(),
			"artdescription":$("input[name='artdescription']").val(),
			"verifycode":$("input[name='verifycode']").val(),
			}, function(data){
				var s =data;
				if((s.search("faultCode")>0)&&(s.search("faultString")>0)){
					alert(s.match("<string>.+?</string>")[0].replace("<string>","").replace("</string>",""));
					$("#reg_verfiycode").attr("src",bloghost+"zb_system/script/c_validcode.php?id=suiranx_nav&amp;tm="+Math.random());
				}else{
					var s =data;
					alert(s);
					window.location=suiranx_navJump;
				}
			}
		);
	}
});


function Get() {
	$(document).ready(function(){
		var url = $("input[name=suiranx_nav_art_url]").val();
		if (url == '') {
		alert('请输入网址！');
	    }else{
		var fp = bloghost+"zb_users/theme/suiranx_nav/frontEnd_get_tkd_favicon";
		$("#meta_btn").val('获取中...'); 
		$.ajax({
			type: "GET", 
			url: 'bloghost+"zb_users/theme/suiranx_nav/frontEnd_get_tkd_favicon.php"', 
			url: fp+".php?url="+url,
			datatype: "script", 
			cache: false, 
			success: function(data){
				$("body").append(data); 
				$("#meta_btn").val('重新获取');
			}});
	}
});		
}