
<ul class="msg clearfix" id="cmt<?php  echo $comment->ID;  ?>">
    <li><?php if ($zbp->CheckPlugin('Gravatar') || $zbp->CheckPlugin('ggravatar')) { ?><img class="avatar" src="<?php  echo $comment->Author->Avatar;  ?>"><?php }else{  ?><?php $randimg=rand(1,16);$randimg=$zbp->host."zb_users/theme/$theme/image/avatar/$randimg.png"; ?><img class="avatar" src="<?php if ($comment->Author->Level<4) { ?><?php  echo $comment->Author->Avatar;  ?><?php }else{  ?><?php  echo $randimg;  ?><?php } ?>"><?php } ?></li>
	<li class="msgarticle">
	<div class="comment-main">
	    <span class="commentname">
	        <a href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" target="_blank"><?php  echo $comment->Author->StaticName;  ?></a>
	    </span>
        <span class="revertcomment"><a href="#comment" rel="nofollow" onclick="zbp.comment.reply('<?php  echo $comment->ID;  ?>')">@回复Ta</a></span>
        <p><small><?php  echo $comment->Time();  ?>&nbsp;</small></p>
        <p class="content"><?php  echo $comment->Content;  ?></p>
    </div>  
    
    <?php  foreach ( $comment->Comments as $comment) { ?>
    <?php  include $this->GetTemplate('comment');  ?>
    <?php }   ?>
	</li>
</ul>
