<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
<div class="page part">
    <h1 class="tt">
        <span>{$article.Title}</span>
        <span class="data fr">
            <small class="info"><i class="fa fa-clock-o"></i>{$article.Time('Y-m-d')}</small>
            <small class="info"><i class="fa fa-eye"></i>{$article.ViewNums}</small>     
        </span>
    </h1>   
    <div class="items">
        <div class="art-main">{$article->Content}</div>
    </div>  
</div>
{if !$article.IsLock} 
    {template:comments} 
    {else}
    <!--<p class="comment-disable sb br mb"><i class="iconfont icon-cry"></i>抱歉，评论功能暂时关闭!</p>-->
{/if}
