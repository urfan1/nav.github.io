var container = document.createElement('script');
$(container).attr('type','text/plain').attr('id','img_editor');
$("body").append(container);
_editor = UE.getEditor('img_editor');
_editor.ready(function () {       
	_editor.hide();
	$(".upload_button").click(function(){		
		object = $(this).parent().find('.uplod_img');
		object2 = $(this).parent().find('#uploadA,#uploadB');
		_editor.getDialog("insertimage").open();
		_editor.addListener('beforeInsertImage', function (t, arg) {
			object.attr("value", arg[0].src);
			object2.attr("src", arg[0].src);
		});
	});
});
 //下面用于上传的图片预览功能

$('.uplod_img').hover(function (e){
    var e = window.event || e;
    var ROOT_PATH = window.location.protocol+"//"+window.location.host;
    var imgsrc = $(this).val();
    if(this.type=="radio"){ imgsrc = $(this).attr("data-img");}
    if(imgsrc.trim()==""){ return; }
    var left = e.clientX+document.body.scrollLeft+20;
    var top = e.clientY+document.body.scrollTop+20;
    $(".showpic").css({left:left,top:top,display:""});
    if(imgsrc.indexOf('://')<0){ imgsrc = ROOT_PATH + '/' + imgsrc;	} else{ imgsrc = imgsrc.replace('mac:','http:'); }
    $(".showpic_img").attr("src", imgsrc);
},function (e){
            $(".showpic").css("display","none");
}); 

