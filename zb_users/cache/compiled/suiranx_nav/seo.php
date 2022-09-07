<?php if ($zbp->Config('suiranx_nav')->seo_switch=='1') { ?> 
<?php if ($type=='article') { ?>
<title><?php if ($article->Metas->arttitle) { ?><?php  echo $article->Metas->arttitle;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?>-<?php  echo $name;  ?></title>
<?php $aryTags = array();foreach($article->Tags as $key){$aryTags[] = $key->Name;}if(count($aryTags)>0){$keywords = implode(',',$aryTags);}else{$keywords = $zbp->name;} ?>
<meta name="keywords" content="<?php if ($article->Metas->artkeywords) { ?><?php  echo $article->Metas->artkeywords;  ?><?php }else{  ?><?php  echo $keywords;  ?><?php } ?>" />
<?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),150)).'...'); ?>
<meta name="description" content="<?php if ($article->Metas->artdescription) { ?><?php  echo $article->Metas->artdescription;  ?><?php }else{  ?><?php  echo $description;  ?><?php } ?>" />
<?php }elseif($type=='page') {  ?>
<title><?php if ($article->Metas->arttitle) { ?><?php  echo $article->Metas->arttitle;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="<?php if ($article->Metas->artkeywords) { ?><?php  echo $article->Metas->artkeywords;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?>" />
<?php $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),150)).'...'); ?>
<meta name="description" content="<?php if ($article->Metas->artdescription) { ?><?php  echo $article->Metas->artdescription;  ?><?php }else{  ?><?php  echo $description;  ?><?php } ?>" />
<meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
<?php }elseif($type=='index') {  ?>
<title><?php  echo $zbp->Config('suiranx_nav')->index_title;  ?></title>
<meta name="keywords" content="<?php  echo $zbp->Config('suiranx_nav')->index_keywords;  ?>">
<meta name="description" content="<?php  echo $zbp->Config('suiranx_nav')->index_description;  ?>">
<?php }elseif($type=='category') {  ?>
<title><?php if ($category->Metas->catetitle) { ?><?php  echo $category->Metas->catetitle;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?><?php if ($page>'1') { ?>-第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="<?php if ($category->Metas->catekeywords) { ?><?php  echo $category->Metas->catekeywords;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?>">
<meta name="description" content="<?php if ($category->Metas->catedescription) { ?><?php  echo $category->Metas->catedescription;  ?><?php }else{  ?><?php  echo $category->Intro;  ?><?php } ?>">
<?php }elseif($type=='tag') {  ?>
<title><?php if ($tag->Metas->tagtitle) { ?><?php  echo $tag->Metas->tagtitle;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?><?php if ($page>'1') { ?>-第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="<?php if ($tag->Metas->tagkeywords) { ?><?php  echo $tag->Metas->tagkeywords;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?>">
<meta name="description" content="<?php if ($tag->Metas->tagdescription) { ?><?php  echo $tag->Metas->tagdescription;  ?><?php }else{  ?><?php  echo $tag->Intro;  ?><?php } ?>">
<?php }else{  ?>
<title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="">
<meta name="description" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>"> 
<?php } ?>
<?php }else{  ?>
<title><?php  echo $title;  ?>-<?php  echo $name;  ?></title>
<meta name="keywords" content="">
<meta name="description" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>"> 
<?php } ?>