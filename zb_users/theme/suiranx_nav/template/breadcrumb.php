<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
<div class="breadnav">
    <div class="container bread">
        <i class="fa fa-home"></i><a title="首页" href="{$host}">首页</a>
        {if $type=='category'}<i class="fa fa-angle-right"></i><a href="{$category.Url}" target="_blank">{$category.Name}</a>{/if}
        {if $type=='article'}<i class="fa fa-angle-right"></i><a href="{$article.Category.Url}" target="_blank">{$article.Category.Name}</a><i class="fa fa-angle-right"></i>内容详情{/if}
        {if $type=='page'}<i class="fa fa-angle-right"></i>{$title}{/if}
        {if $type=='author'}<i class="fa fa-angle-right"></i>{$title}发布的内容{/if}
        {if $type=='date'}<i class="fa fa-angle-right"></i>{$title}发布的内容{/if}
        {if $type=='tag'}<i class="fa fa-angle-right"></i>包含"{$title}"标签的内容{/if}
    </div>
</div>
