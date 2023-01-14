
function getCSS()
{
        datetoday = new Date();
        timenow=datetoday.getTime();
        datetoday.setTime(timenow);
        thehour = datetoday.getHours();
        if (thehour<7)
            display = "../css/night.css";
        else if (thehour<19)
            display = "../css/day.css";
        else
            display = "../css/night.css";
        
        var css = '<';
        css+='link rel="stylesheet" href='+display+' \/';
        css+='>';
        document.write(css);
}

$(function(){
    var rightNav = "";
    rightNav += "<ul class='ccRightNav'>";
    rightNav += "<li><a href='http://www.eueui.com/' target='_blank'>美化鸭首页</a></li>";
    rightNav += "<li><a href='http://www.eueui.com/Reward.html' target='_blank'>打赏一下</a></li>";
    rightNav += "<hr>";
    rightNav += "<li class='qrBtn'><a>微信公众号</a></li>";
    rightNav += "<li class='qrBox'><img src='img/qrcode_for_gh_f6a93f3195d1_344.jpeg' alt='微信二维码'/></li>";
    rightNav += "</ul>";
    $("body").append(rightNav);
    $(".ccRightNav").css({
        "width":"200px",
        "background":"#fff",
        "border-radius":"5px",
        "position":"fixed",
        "padding":"5px 0 0 0",
        "margin":"0",
        "z-index":"1200",
        "box-shadow":"0 2px 35px rgba(50,50,90,0.1)",
        "display":"none"
    });
    $(".ccRightNav li").css({
        "height":"34px",
        "line-height":"25px",
        "font-size":"12px",
        "list-style":"none",
        "padding":"5px 0px 5px",
        "margin":"0 0 4px 0",
        "text-decoration":"none"
    }).mouseover(function(){
        $(this).css("background","#2affda").find("a,small").css("color","rgb(175, 175, 175)");
    }).mouseleave(function(){
        $(this).css("background","none").find("a").css("color","#111").find("small").css("color","#a6a6a6");
    });
    $(".ccRightNav li a").css({
        "display":"block",
        "padding":"5px 20px",
        "margin":"0",
        "color":"rgb(17, 17, 17)",
        "text-decoration":"none",
        "font-size":"12px",
        "cursor":"pointer"
    });
    $(".ccRightNav li a small").css({
        "color":"#a6a6a6",
        "font-size":"13px",
        "float":"right"
    });
    $(".ccRightNav hr").css({
        "border":"none",
        "border-bottom":"1px solid #e9e9e9"
    });
    $(".ccRightNav li.qrBox").css({
        "width":$(".ccRightNav").height()-33+"px",
        "height":$(".ccRightNav").height()-33+"px",
        "max-width":"150px",
        "width":"150px",
        "max-height":"170px",
        "position":"absolute",
        "bottom":"-5px",
        "border":"1px solid #e9e9e9",
		"padding":"0",
        "overflow":"hidden",
        "display":"none"
    });
    $(".ccRightNav li.qrBox img").css({
        "width":"100%",
        "height":"100%",
		"margin-left":"0",
        "opacity":"1",
    });
    $(".ccRightNav li.qrBtn").mouseover(function(){
        $(".ccRightNav li.qrBox").fadeIn(1);
    }).mouseleave(function(){
        $(".ccRightNav li.qrBox").fadeOut(1);
    });
    $("*").bind("contextmenu",function(e){
        var pointX = (e.pageX)-($(window).scrollLeft()),pointY = (e.pageY)-($(window).scrollTop());
        $(".ccRightNav").css({
            "display":"block"
        });
        if(pointX+600>=$(window).width()){
            $(".ccRightNav").css({
                "right":$(window).width()-pointX+"px",
                "left":"auto"
            });
			$(".ccRightNav li.qrBox").css({
				"right":"200px",
				"left":"auto"
			});
        }else{
            $(".ccRightNav").css({
                "left":pointX+"px",
                "right":"auto"
            });
			$(".ccRightNav li.qrBox").css({
				"left":"200px",
				"right":"auto"
			});
        }
        if($(window).height()-pointY<=$(".ccRightNav").height()){
            $(".ccRightNav").css({
                "bottom":$(window).height()-pointY+"px",
                "top":"auto"
            });
        }else{
            $(".ccRightNav").css({
                "top":pointY+"px",
                "bottom":"auto"
            });
        }
        return false;
    }).click(function(){
        $(".ccRightNav").css("display","none");
    })
});

(function() {
	var click_cnt = 0;
	jQuery(document).ready(function($) {
		$("html").click(function(e) {
			var n = 18;
			var $i;
			click_cnt++;
			if (click_cnt == 10) {
				$i = $("<b></b>").text("OωO");
			} else if (click_cnt == 20) {
				$i = $("<b></b>").text("(๑•́ ∀ •̀๑)");
			} else if (click_cnt == 30) {
				$i = $("<b></b>").text("(๑•́ ₃ •̀๑)");
			} else if (click_cnt == 40) {
				$i = $("<b></b>").text("(๑•̀_•́๑)");
			} else if (click_cnt == 50) {
				$i = $("<b></b>").text("（￣へ￣）");
			} else if (click_cnt == 60) {
				$i = $("<b></b>").text("(╯°口°)╯(┴—┴");
			} else if (click_cnt == 70) {
				$i = $("<b></b>").text("૮( ᵒ̌皿ᵒ̌ )ა");
			} else if (click_cnt == 80) {
				$i = $("<b></b>").text("╮(｡>口<｡)╭");
			} else if (click_cnt == 90) {
				$i = $("<b></b>").text("( ง ᵒ̌皿ᵒ̌)ง⁼³₌₃");
			} else if (click_cnt >= 100 && click_cnt <= 105) {
				$i = $("<b></b>").text("(ꐦ°᷄д°᷅)");
			} else {
				$i = $("<b></b>").text("❤");
				n = Math.round(Math.random() * 14 + 6)
			}
			var x = e.pageX,
				y = e.pageY;
			$i.css({
				"z-index": 9999,
				"top": y - 20,
				"left": x,
				"position": "absolute",
				"color": "#E94F06",
				"font-size": n,
				"-moz-user-select": "none",
				"-webkit-user-select": "none",
				"-ms-user-select": "none"
			});
			$("body").append($i);
			$i.animate({
				"top": y - 180,
				"opacity": 0
			}, 1500, function() {
				$i.remove();
			});
		});
	});
})();


// ==UserScript==
// @name         鼠标移动点击出现随机颜色表情符号
// @version      1.2
// @description  242个符号随机出现，双击切换移动鼠标出现痕迹表情符号
// @author       日狗少年
// @include      /^https?\:\/\/[^\s]*/
// @grant        GM_addStyle
// @require      http://images.qijishow.com/jquery.min1.7.js
// @run-at       document_start
// @grant        unsafeWindow
// @namespace    
// ==/UserScript==

(function() {
    var flag =false;
    var chars=['😀','😁','😂','😃','😄','😅','😆','😇','😈','😉','😊','😋','😌','😍','😎','😏','😐','😑','😒','😓','😔','😕','😖','😗','😘','😙','😚','😛','😜','😝','😞','😟','😠','😡','😢','😣','😤','😥','😦','😧','😨','😩','😪','😫','😬','😭','😮','😯','😰','😱','😲','😳','😴','😵','😶','😷'];
    jQuery(document).ready(function($) {
		$("html").mousemove(function(e) {
            if(flag){
                var color = "#"+("00000"+((Math.random()*16777215+0.5)>>0).toString(16)).slice(-6);
                var id=Math.ceil(Math.random()*62);
                var xr=Math.ceil(Math.random()*400)-200;
                var yr=Math.ceil(Math.random()*400)-200;
                var $i;
                $i = $("<b></b>").text(chars[id]);
                var n = Math.round(Math.random() * 10 + 16);
                var x = e.pageX,
                    y = e.pageY;
                $i.css({
                    "z-index": 9999,
                    "color":color,
                    "top": y,
                    "left": x,
                    "position": "absolute",
                    "font-size": n,
                    "-moz-user-select": "none",
                    "-webkit-user-select": "none",
                    "-ms-user-select": "none"
                });
                $("body").append($i);
                $i.animate({
                    "top": y + yr,
                    "left": x + xr,
                    "opacity": 0,
                }, 1000, function() {
                    $i.remove();
                });
            }
        });
        
        $("html").click(function(e) {
            if(!flag){
                var color = "#"+("00000"+((Math.random()*16777215+0.5)>>0).toString(16)).slice(-6);
                var id=Math.ceil(Math.random()*62);
                var xr=Math.ceil(Math.random()*400)-200;
                var yr=Math.ceil(Math.random()*400)-200;
                var $i;
                $i = $("<b></b>").text(chars[id]);
                var n = Math.round(Math.random() * 10 + 26);
                var x = e.pageX,
                    y = e.pageY;
                $i.css({
                    "z-index": 9999,
                    "color":color,
                    "top": y,
                    "left": x,
                    "position": "absolute",
                    "font-size": n,
                    "-moz-user-select": "none",
                    "-webkit-user-select": "none",
                    "-ms-user-select": "none"
                });
                $("body").append($i);
                $i.animate({
                    "top": y + yr,
                    "left": x + xr,
                    "opacity": 0,
                }, 1000, function() {
                    $i.remove();
                });
            }
        });

	});
})();


((function() {
    var callbacks = [],
        timeLimit = 50,
        open = false;
    setInterval(loop, 1);
    return {
        addListener: function(fn) {
            callbacks.push(fn);
        },
        cancleListenr: function(fn) {
            callbacks = callbacks.filter(function(v) {
                return v !== fn;
            });
        }
    }
    function loop() {
        var startTime = new Date();
        debugger;
        if (new Date() - startTime > timeLimit) {
            if (!open) {
                callbacks.forEach(function(fn) {
                    fn.call(null);
                });
            }
            open = true;
            window.stop();
            alert('不要扒我了');
            window.location.reload();
        } else {
            open = false;
        }
    }
})()).addListener(function() {
    window.location.reload();
});


