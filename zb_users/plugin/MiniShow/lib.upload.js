/*-------------------
*Description:        By www.yiwuku.com
*Website:            https://app.zblogcn.com/?auth=115
*Author:             尔今 erx@qq.com
*update:             2017-01-06(Last:2017-01-06)
-------------------*/

var container = document.createElement('script');
$(container).attr('type','text/plain').attr('id','img_editor');
$("body").append(container);
_editor = UE.getEditor('img_editor');
_editor.ready(function () {
	_editor.hide();
	$(".up_pic .upbtn").bind('click',function(){		
		object = $(this).parent().find('input');		
		_editor.getDialog("insertimage").open();
		_editor.addListener('beforeInsertImage', function (t, arg) {
			object.attr("value", arg[0].src);
		});
	});
});