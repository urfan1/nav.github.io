<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
<div class="part">
    <div class="bar clearfix">
        <h1 class="tt">
           {if strlen ( $article->Metas->suiranx_nav_art_name ) > 1}{$article.Title} - {$article->Metas->suiranx_nav_art_name}{else}{$article.Title}{/if}
        </h1>  
        <div class="r-intro fr">
            <span class="data fr">
                <small class="info"><i class="fa fa-clock-o"></i>{$article.Time('Y-m-d')}</small>
                <small class="info"><i class="fa fa-eye"></i>{$article.ViewNums}{suiranx_nav_views($article->ID)}</small>
                <small class="info"><i class="fa fa-user-o"></i>{$article.Author.StaticName}</small>
        		{if $user.ID>0}
        		<small class="info"><i class="fa fa-pencil"></i></small>
        		<a class="float-none" target="_blank" href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article.ID}" rel="nofollow">编辑</a>
        		{/if}        
            </span>
        </div> 
    </div>
    <div class="items">
        <div class="row post-single">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="pic fl">
                    <div class="blur blur-layer" style="background: transparent url({if strlen ( $article->Metas->coverimg ) > 4}{$article->Metas->coverimg}{else}{suiranx_nav_firstimg2($article)}{/if}) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;animation: rotate 20s linear infinite;"> 
                    </div>
                    <img class="img-cover" src="{if strlen ( $article->Metas->coverimg ) > 4}{$article->Metas->coverimg}{else}{suiranx_nav_firstimg2($article)}{/if}" alt="{$article.Title}" title="{$article.Title}">
                </div>
                <div class="list">
                    <p>站点名称：{$article.Title}</p>
                    <p class="cate">所属分类：<a href="{$article.Category.Url}" class="mcolor">{$article.Category.Name}</a></p>
                    {if $article.Tags}
                    <p class="tag">相关标签：
                        {if $article.Tags}
                    		{foreach $article.Tags as $tag}
                    		    <span class="padding">
                    		        <a class="transition tags" href="{$tag.Url}" title="{$tag.Name}"># {$tag.Name}</a>
                    		    </span>
                    		{/foreach}
                	    {/if}
                	</p>
                	{/if}
                    <p class="site">官方网址：{suiranx_nav_from_url($article->ID)}</p>
                    <p class="seo">SEO查询：
                        <a rel="nofollow" href="https://www.aizhan.com/cha/{suiranx_nav_url_delete_http($article->ID)}" target="_blank"><i class="fa fa-bar-chart"></i>爱站网</a>
                    <!-- 站长网pc和wap的url不一样，需做判断  -->    
                    {if suiranx_nav_is_mobile()}
                        <a rel="nofollow" href="https://mseo.chinaz.com/{suiranx_nav_url_delete_http($article->ID)}" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a>    
                    {else}
                        <a rel="nofollow" href="http://seo.chinaz.com/{suiranx_nav_from_url($article->ID)}" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a>    
                    {/if}                          

                    </p>
                
                    
                    <a class="btn transition" target="_blank" href="{suiranx_nav_from_url($article->ID)}" {if $zbp->Config('suiranx_nav')->nofollow_switch}rel="nofollow"{/if}>进入网站
                    <i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>  
            <div class="col-xs-12 col-sm-12 col-md-4">
                <!-- 广告位AD2  -->
                {if suiranx_nav_is_mobile()}
                    {if $zbp->Config('suiranx_nav')->ad2_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->m_ad2 ) > 5}
                        <div style="margin-top:10px;">{$zbp->Config('suiranx_nav')->m_ad2}</div>
                    {/if}
                {else}
                    {if $zbp->Config('suiranx_nav')->ad2_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->ad2 ) > 5}
                        <div>{$zbp->Config('suiranx_nav')->ad2}</div>
                    {/if}
                {/if} 
            </div>             
        </div> 
    </div>    
</div>
<div class="part">
    <p class="tt"><span>站点介绍</span></p>  
    <div class="items">
        <div class="art-main">{$article->Content}</div>
    </div>
</div> 
{template:post-echart}
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
    <p class="tt"><span>相似站点</span></p>
    <div class="items">
        <div class="row"> 
            {if strlen ( $article.Tag ) > 0}
            {foreach GetList(8,null,null,null,null,null,array('is_related'=>$article.ID)) as $related}
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="item">
                        <a class="link" target="_blank" href="{suiranx_nav_from_url($related->ID)}" rel="nofollow"><i class="autoleft fa fa-angle-right" title="直达网站"></i></a>
                        <a class="a" href="{$related.Url}" title="{$article.Title}" target="_blank">
                            <img class="img-cover br" src="{if strlen ( $related->Metas->coverimg ) > 4}{$related->Metas->coverimg}{else}{suiranx_nav_firstimg2($related)}{/if}" alt="{$related.Title}" title="{$related.Title}">
                            <h3>{$related.Title}</h3>
                            <p>
                            {if strlen($related.Intro)>0}
                				{php}$intro= trim(SubStrUTF8(TransferHTML($related->Intro,'[nohtml]'),100)).'...';{/php}
                				{else}
                				{php}$intro= trim(SubStrUTF8(TransferHTML($related->Content,'[nohtml]'),100)).'...';{/php}
                			{/if}
                			{$intro}</p>
                        </a>
                    </div>
                </div>  
                {/foreach}
                {else}
                {foreach GetList(8,$article.Category.ID) as $newlist}
                  
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="item">
                        <a class="link" target="_blank" href="{suiranx_nav_from_url($newlist->ID)}" rel="nofollow"><i class="autoleft fa fa-angle-right" title="直达网站"></i></a>
                        <a class="a" href="{$newlist.Url}" title="{$newlist.Title}" target="_blank">
                            <img class="img-cover br" src="{if strlen ( $newlist->Metas->coverimg ) > 4}{$newlist->Metas->coverimg}{else}{suiranx_nav_firstimg2($newlist)}{/if}" alt="{$newlist.Title}" title="{$newlist.Title}">
                            <h3>{$newlist.Title}</h3>
                            <p>
                            {if strlen($newlist.Intro)>0}
                				{php}$intro= trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),100)).'...';{/php}
                				{else}
                				{php}$intro= trim(SubStrUTF8(TransferHTML($newlist->Content,'[nohtml]'),100)).'...';{/php}
                			{/if}
                			{$intro}</p>
                        </a>
                    </div>
                </div>
            {/foreach}
            {/if}  
        </div> 
    </div>
</div>
{if !$article.IsLock} 
    {template:comments} 
    {else}
    <!--<p class="comment-disable sb br mb"><i class="iconfont icon-cry"></i>抱歉，评论功能暂时关闭!</p>-->
{/if}