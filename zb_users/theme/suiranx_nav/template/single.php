<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
{template:header}
<div class="container">
	{if $article.Type==0}
    {template:post-single}
    {else}
    {template:post-page}
    {/if}
</div>
{template:footer}