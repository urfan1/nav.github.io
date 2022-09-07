!function(o){
    var b=$('body'),d;
    function upload(callback){
        var id='ajax_upload'+new Date().getTime();
        b.append(`<input type="file" id="${id}" accept="${o.accept}" style="display:none">`);
        var el=$('#'+id);
        b.one('change','#'+id,function(){
            var f = new FormData();
            f.append('file',$(this)[0].files[0]);
            $.ajax({
                url: ajaxurl+o.src,
                type: 'POST',
                dataType: 'json',
                data: f,
                contentType: false,
                processData: false,
                xhr: function() {
                    var xhr = new XMLHttpRequest(),t;
                    xhr.upload.addEventListener('progress', function (e) {
                        if (e.lengthComputable) {
                            t = Math.floor(e.loaded / e.total * 100);
                            o.progress && o.progress(d, t);
                        }
                    });
                    return xhr;
                },
                success:function(r){
                    o.success(d, r);
                },
                error:function(r){
                    o.error && o.error(d,r);
                }
            });
        }),
        el.click();
    }
    b.on('click',o.click,function(){
        d = $(this);
        upload(function(r){
            o.success(d, r);
        });
    });
}({
    src: 'yk_slide_kefu_upload',  //这里改为你的应用ID
    click: '.yk_upload_button',  //这里改成你传按钮的css选择器
    accept: '.jpg,.jpeg,.png,.gif,.bmp,.svg,.ico',
    success: function(e, r){
        console.log('上传成功，图片链接：'+r.url);
        e.siblings('.yk_upload_input').attr("value", r.url);  //把链接填写在上传按钮兄弟元素的 .input_img文本框
        e.siblings('img').attr('src',r.url);  //修改同级元素img图片链接
        e.val('上传');  //恢复上传按钮名称
    },
    error: function(e){
        alert('上传失败');
    },
    progress: function(e,n){
        e.val('上传进度：'+n+'%');
    }
});