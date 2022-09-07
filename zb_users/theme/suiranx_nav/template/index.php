<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
{if $type=='index'}
    {template:index-content}
{elseif $type=='category'}
    {php}
    $cateid = $category->ID;
    $cate_id2 = $zbp->Config( 'suiranx_nav' )->cate_id2;
    $pattern = '/(^|,)'.$cateid.'(,|$)/';
    {/php}
	{if preg_match($pattern, $cate_id2)}
	{template:post-cat-art}
	{else}
	{template:post-cat}
	{/if}
{else}
	{template:post-cat}
{/if}