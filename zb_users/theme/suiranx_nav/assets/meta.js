function GetData() {
	$(document).ready(function(){
		var url = $("#meta_suiranx_nav_art_url").val();
		if (url == '') {
		alert('请输入网址！');
	    }else{
		var fp = bloghost+"zb_users/theme/suiranx_nav/get_tkd_favicon";
		$("#meta_btn").val('抓取中...'); 
		$.ajax({
			type: "GET", 
			url: 'bloghost+"zb_users/theme/suiranx_nav/get_tkd_favicon.php"', 
			url: fp+".php?url="+url,
			datatype: "script", 
			cache: false, 
			success: function(data){
				$("body").append(data); 
				$("#meta_btn").val('重新抓取');
			}});
	    }
    });	
}