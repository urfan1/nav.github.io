<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
{* Template Name:文章详情页模板 *}
{template:header}
<div class="container">
    <div class="part">
        <div class="bar clearfix">
            <h1 class="tt">{$article.Title}</h1>   
            <div class="r-intro fr">
                <span class="data fr">
                    <small class="info"><i class="fa fa-clock-o"></i>{$article.Time('Y-m-d')}</small>
                    <small class="info"><i class="fa fa-eye"></i>{$article.ViewNums}</small>
                    <small class="info"><i class="fa fa-user-o"></i>{$article.Author.StaticName}</small>
            		{if $user.ID>0}
            		<small class="info"><i class="fa fa-pencil"></i></small>
            		<a class="float-none" target="_blank" href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article.ID}" rel="nofollow">编辑</a>
            		{/if}        
                </span>  
            </div>    
        </div> 
        <div class="items">
            <div class="art-main">
                {$article->Content}
                <div class="art-copyright br mb">
    			    <div>本文地址：<a href="{$article.Url}" title="{$article.Title}" target="_blank">{$article.Url}</a></div>
    			    <div><span class="copyright">版权声明：</span>除非特别标注，否则均为本站原创文章，转载时请以链接形式注明文章出处。</div>
    		    </div> 
                {if $article.Tags}
                <p class="art-tag">相关标签：
                    {if $article.Tags}
                		{foreach $article.Tags as $tag}
                		    <span class="padding">
                		        <a class="transition tags" href="{$tag.Url}" title="{$tag.Name}"># {$tag.Name}</a>
                		    </span>
                		{/foreach}
            	    {/if}
            	</p>
            	{/if}
            </div>
    		          
        </div>
    </div>
        <!-- 广告位AD3  -->
        {if suiranx_nav_is_mobile()}
            {if $zbp->Config('suiranx_nav')->ad3_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->m_ad3 ) > 5}
                <div style="margin-bottom:24px;">{$zbp->Config('suiranx_nav')->m_ad3}</div>
            {/if}
        {else}
            {if $zbp->Config('suiranx_nav')->ad3_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->ad3 ) > 5}
                <div style="margin-bottom:24px;">{$zbp->Config('suiranx_nav')->ad3}</div>
            {/if}
        {/if}
    <div class="part related">
        <p class="tt"><span>相关推荐</span></p>
        <div class="items">
            <div class="row"> 
                    {foreach GetList(8,$article.Category.ID) as $newlist}
                      
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="item art-item transition">
                            <a class="art-a" href="{$newlist.Url}" title="{$newlist.Title}" target="_blank">
                                <img class="img-cover" src="{if strlen ( $newlist->Metas->coverimg ) > 4}{$newlist->Metas->coverimg}{else}{suiranx_nav_firstimg($newlist)}{/if}" alt="{$newlist.Title}" title="{$newlist.Title}">
                            </a>
                            <h3><a class="" href="{$newlist.Url}" title="{$newlist.Title}" target="_blank">{$newlist.Title}</a></h3>
                            <p>
                            {if strlen($newlist.Intro)>0}
                    			{php}$intro= trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),100)).'...';{/php}
                    			{else}
                    			{php}$intro= trim(SubStrUTF8(TransferHTML($newlist->Content,'[nohtml]'),100)).'...';{/php}
                    		{/if}
                    		{$intro}</p>
                            
                        </div>
                    </div>
                {/foreach}
            </div> 
        </div>
    </div>
    {if !$article.IsLock} 
        {template:comments} 
        {else}
        <!--<p class="comment-disable sb br mb"><i class="iconfont icon-cry"></i>抱歉，评论功能暂时关闭!</p>-->
    {/if}
</div>
{template:footer}
