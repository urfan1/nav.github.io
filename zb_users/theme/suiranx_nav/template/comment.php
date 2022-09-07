<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
<ul class="msg clearfix" id="cmt{$comment.ID}">
    <li>{if $zbp->CheckPlugin('Gravatar') || $zbp->CheckPlugin('ggravatar')}<img class="avatar" src="{$comment.Author.Avatar}">{else}{php}$randimg=rand(1,16);$randimg=$zbp->host."zb_users/theme/$theme/image/avatar/$randimg.png";{/php}<img class="avatar" src="{if $comment.Author.Level<4}{$comment.Author.Avatar}{else}{$randimg}{/if}">{/if}</li>
	<li class="msgarticle">
	<div class="comment-main">
	    <span class="commentname">
	        <a href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>
	    </span>
        <span class="revertcomment"><a href="#comment" rel="nofollow" onclick="zbp.comment.reply('{$comment.ID}')">@回复Ta</a></span>
        <p><small>{$comment.Time()}&nbsp;</small></p>
        <p class="content">{$comment.Content}</p>
    </div>  
    
    {foreach $comment.Comments as $comment}
    {template:comment}
    {/foreach}
	</li>
</ul>
