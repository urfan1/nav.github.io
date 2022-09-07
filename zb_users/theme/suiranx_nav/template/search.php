<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
{template:header}	
<style>.breadnav{display:none}.breadnav2{font-size:14px;padding:10px 0;color:#6b7386;}.breadnav2 a:hover{color:#ff3636;}.breadnav2 i{padding:0 6px;}.breadnav2 .bread{padding:10px 20px;}</style>
<div class="breadnav2">
    <div class="container bread">
        <i class="fa fa-home"></i><a title="首页" href="{$host}">首页</a>
        <i class="fa fa-angle-right"></i>{$title} 的结果
    </div>
</div>
<div class="container">
    <div class="part">
        <div class="items">
        	<div class="row">
        		{foreach $articles as $keyd=>$article}
                    {if $article.IsTop}
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <div class="item">
                                <a class="link" target="_blank" href="{$article.Url}" {if $zbp->Config('suiranx_nav')->nofollow_switch}rel="nofollow"{/if}><i class="autoleft fa fa-angle-right" title="查看详情"></i></a>
                                <a class="a" href="{$article.Url}" title="{$article.Title}" target="_blank">
                                    <img src="{if strlen ( $article->Metas->coverimg ) > 4}{$article->Metas->coverimg}{else}{suiranx_nav_firstimg2($article)}{/if}" alt="{$article.Title}" title="{$article.Title}">
                                    <h3><span class="top-show">[顶]</span>{$article.Title}</h3>
                                    <p>
                                    {if strlen($article.Intro)>0}
                        				{php}$intro= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),100)).'...';{/php}
                        				{else}
                        				{php}$intro= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...';{/php}
                        			{/if}
                        			{$intro}</p>
                                </a>
                            </div>
                        </div>
                    {else}
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <div class="item">
                                <a class="link" target="_blank" href="{$article.Url}" {if $zbp->Config('suiranx_nav')->nofollow_switch}rel="nofollow"{/if}><i class="autoleft fa fa-angle-right" title="查看详情"></i></a>  
                                <a class="a" href="{if $zbp->Config('suiranx_nav')->go_switch}{suiranx_nav_from_url($article->ID)}{else}{$article.Url}{/if}" title="{$article.Title}" target="_blank">
                                    <img src="{if strlen ( $article->Metas->coverimg ) > 4}{$article->Metas->coverimg}{else}{suiranx_nav_firstimg2($article)}{/if}" alt="{$article.Title}" title="{$article.Title}">
                                    <h3>{$article.Title}</h3>
                                    <p>
                                    {if strlen($article.Intro)>0}
                        				{php}$intro= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),100)).'...';{/php}
                        				{else}
                        				{php}$intro= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...';{/php}
                        			{/if}
                        			{$intro}</p>
                                </a>
                            </div>
                        </div>
                    {/if}                 
        		{/foreach}
        	</div>
        	{template:pagebar}
    	</div>
	</div>
</div>
{template:footer}
