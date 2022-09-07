/*-------------------
*Description:        By www.yiwuku.com
*Website:            https://app.zblogcn.com/?auth=115
*Author:             尔今 erx@qq.com
*update:             2017-01-06(Last:2017-01-06)
-------------------*/

!window.jQuery && alert("很遗憾，手机站广告神器插件无法启用！原因是当前主题jQuery加载异常，可能缺失或不规范导致，建议联系主题作者修复或换用其它主题。");
var mnstop = mns_getCookie("mnstop");
var mnsbot = mns_getCookie("mnsbot");
$(function(){
	//顶部
	if($(".mnstop").length > 0 && (mnstop != 1 || mnstop == null)){
		var mnstop_html = $(".mnstop").prop("outerHTML");
		$(window).load(function(){
			$("body").prepend(mnstop_html+'<div class="mnstop-blank"></div>');
			$(".mnstop:first").addClass("mnsblock").append('<div class="mns-close">&times;</div>');
			$(".mnstop-blank").height($(".mnstop img").height());
		})
		$(document).delegate('.mnstop .mns-close', 'click', function(){
			$(this).parent().slideUp();
			$(".mnstop-blank").slideUp();
			mns_setCookie("mnstop",1);
		});
	}
	//底部
	if($(".mnsbot").length > 0 && (mnsbot != 1 || mnsbot == null)){
		var mnsbot_html = $(".mnsbot").prop("outerHTML");
		$(window).load(function(){
			$("body").append(mnsbot_html+'<div class="mnsbot-blank"></div>');
			$(".mnsbot:last").addClass("mnsblock").append('<div class="mns-close">&times;</div>');
			$(".mnsbot-blank").height($(".mnsbot:last img").height());
		})
		$(document).delegate('.mnsbot .mns-close', 'click', function(){
			$(this).parent().slideUp();
			$(".mnsbot-blank").slideUp();
			mns_setCookie("mnsbot",1);
		});
	}
});
function mns_setCookie(name, value) {
	var exp = new Date();
	exp.setTime(exp.getTime() + 1 * 24 * 60 * 60 * 1000);
	document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString()+";path=/";
}
function mns_getCookie(name) {
	var arr,
	reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
	if (arr = document.cookie.match(reg)) return (arr[2]);
	else return null
}

//若无十足把握，切勿修改以上代码，容易出错