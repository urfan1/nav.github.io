{if $zbp->Config('suiranx_nav')->seo_switch=='1'} 
{if $type=='article'}
<title>{if $article.Metas.arttitle}{$article.Metas.arttitle}{else}{$title}{/if}-{$name}</title>
{php}$aryTags = array();foreach($article->Tags as $key){$aryTags[] = $key->Name;}if(count($aryTags)>0){$keywords = implode(',',$aryTags);}else{$keywords = $zbp->name;}{/php}
<meta name="keywords" content="{if $article.Metas.artkeywords}{$article.Metas.artkeywords}{else}{$keywords}{/if}" />
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),150)).'...');{/php}
<meta name="description" content="{if $article.Metas.artdescription}{$article.Metas.artdescription}{else}{$description}{/if}" />
{elseif $type=='page'}
<title>{if $article.Metas.arttitle}{$article.Metas.arttitle}{else}{$title}{/if}-{$name}</title>
<meta name="keywords" content="{if $article.Metas.artkeywords}{$article.Metas.artkeywords}{else}{$title}{/if}" />
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),150)).'...');{/php}
<meta name="description" content="{if $article.Metas.artdescription}{$article.Metas.artdescription}{else}{$description}{/if}" />
<meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='index'}
<title>{$zbp->Config('suiranx_nav')->index_title}</title>
<meta name="keywords" content="{$zbp->Config('suiranx_nav')->index_keywords}">
<meta name="description" content="{$zbp->Config('suiranx_nav')->index_description}">
{elseif $type=='category'}
<title>{if $category.Metas.catetitle}{$category.Metas.catetitle}{else}{$category.Name}{/if}{if $page>'1'}-第{$pagebar.PageNow}页{/if}-{$name}</title>
<meta name="keywords" content="{if $category.Metas.catekeywords}{$category.Metas.catekeywords}{else}{$category.Name}{/if}">
<meta name="description" content="{if $category.Metas.catedescription}{$category.Metas.catedescription}{else}{$category.Intro}{/if}">
{elseif $type=='tag'}
<title>{if $tag.Metas.tagtitle}{$tag.Metas.tagtitle}{else}{$tag.Name}{/if}{if $page>'1'}-第{$pagebar.PageNow}页{/if}-{$name}</title>
<meta name="keywords" content="{if $tag.Metas.tagkeywords}{$tag.Metas.tagkeywords}{else}{$tag.Name}{/if}">
<meta name="description" content="{if $tag.Metas.tagdescription}{$tag.Metas.tagdescription}{else}{$tag.Intro}{/if}">
{else}
<title>{$title}-{$name}</title>
<meta name="keywords" content="">
<meta name="description" content="{$title},{$name}"> 
{/if}
{else}
<title>{$title}-{$name}</title>
<meta name="keywords" content="">
<meta name="description" content="{$title},{$name}"> 
{/if}