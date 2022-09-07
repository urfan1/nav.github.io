<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
{if $socialcomment}
{$socialcomment}
{else}
<div class="part">
    <ul class="msg msghead">
    	<li class="tbname">
    	    <p class="tt">
                <span>评论列表
                    {if $article.CommNums==0}
                    （<span class="emphasize">0</span>条）
                    {else}
                    （<span class="emphasize">{$article.CommNums}</span>条）
                    {/if}            
                </span>
            </p>
        </li>
    </ul>
    <div class="items">
        {if $article.CommNums==0}<i class="fa fa-smile-o"></i>&nbsp;暂无评论，快来抢沙发吧~{/if}
        <label id="AjaxCommentBegin"></label>
        <!--评论输出-->
        {foreach $comments as $key => $comment}
        {template:comment}
        {/foreach}
    
        <!--评论翻页条输出-->
        <div class="pagebar commentpagebar">
        {template:pagebar}
        </div>
        <label id="AjaxCommentEnd"></label>
    </div>
</div>
<!--评论框-->
{template:commentpost}

{/if}