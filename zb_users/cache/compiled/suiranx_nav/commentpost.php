
<div class="part">
    <div class="post" id="divCommentPost">
        <p class="tt posttop"><span>发布评论</span><a class="hook" name="comment" rel="nofollow"></a><a rel="nofollow" id="cancel-reply" href="#divCommentPost" style="display:none;"><small>取消回复</small></a></p>
    	<form id="frmSumbit" class="items" target="_self" method="post" action="<?php  echo $article->CommentPostUrl;  ?>" >
    	<input type="hidden" name="inpId" id="inpId" value="<?php  echo $article->ID;  ?>" />
    	<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
    <?php if ($user->ID>0) { ?>
    	<input type="hidden" name="inpName" id="inpName" value="<?php  echo $user->StaticName;  ?>" />
    	<input type="hidden" name="inpEmail" id="inpEmail" value="<?php  echo $user->Email;  ?>" />
    	<input type="hidden" name="inpHomePage" id="inpHomePage" value="<?php  echo $user->HomePage;  ?>" />
    <?php }else{  ?>
        <div class="row">
        	<div class="col-xs-12 col-sm-4 col-md-3">
        	    <input type="text" name="inpName" id="inpName" class="text" value="" size="28" tabindex="1" placeholder="昵称(必填)"/>
        	</div>
        	<div class="col-xs-12 col-sm-4 col-md-3">
        	    <input type="text" name="inpEmail" id="inpEmail" class="text" value="<?php  echo $user->Email;  ?>" size="28" tabindex="2" placeholder="邮箱"/>
        	</div>
        	<div class="col-xs-12 col-sm-4 col-md-3">
        	    <input type="text" name="inpHomePage" id="inpHomePage" class="text" value="<?php  echo $user->HomePage;  ?>" size="28" tabindex="3" placeholder="网址"/>
        	</div>
            <?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?>
        	<div class="col-xs-12 col-sm-4 col-md-3">
        	   <div class="verify-wrap">
            	    <input type="text" name="inpVerify" id="inpVerify" class="text" value="" size="28" tabindex="4" placeholder="验证码"/>
            	    <img style="width:<?php  echo $option['ZC_VERIFYCODE_WIDTH'];  ?>px;height:<?php  echo $option['ZC_VERIFYCODE_HEIGHT'];  ?>px;cursor:pointer;" src="<?php  echo $article->ValidCodeUrl;  ?>" alt="" title="" onclick="javascript:this.src='<?php  echo $article->ValidCodeUrl;  ?>&amp;tm='+Math.random();"/>
        	    </div>
        	</div>
            <?php } ?>	
    	</div>
    
    
    <?php } ?>
    	<p><textarea name="txaArticle" id="txaArticle" class="text" cols="50" rows="4" tabindex="5" placeholder="来都来了，说点什么吧..."></textarea></p>
    	<p><input name="sumbit" type="submit" tabindex="6" value="发布" onclick="return zbp.comment.post()" class="button transition"/></p>
    	</form>
    </div>
</div>