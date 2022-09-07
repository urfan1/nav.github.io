<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta name="force-rendering" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<meta name="applicable-device" content="pc,mobile"><?php  include $this->GetTemplate('seo');  ?>
<?php if ($zbp->Config('suiranx_nav')->qq_card_switch=='1') { ?><?php  echo $zbp->Config('suiranx_nav')->qq_card;  ?><?php } ?>

<link rel="shortcut icon" href="<?php  echo $host;  ?>zb_users/theme/suiranx_nav/image/<?php suiranx_nav_Get_Logo('favicon','ico'); ?>">
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/fontawesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/style.css?ver=3.72" type="text/css">
<?php if ($type=='index' && $page=='1') { ?>
<link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $name;  ?>">
<?php } ?>
<!--[if lt IE 9]><div class="fuck-ie"><p class="tips">*您的IE浏览器版本过低，为获得更好的体验请使用Chrome、Firefox或其他现代浏览器!</p></div><![endif]-->
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php" type="text/javascript"></script>
<?php  echo $header;  ?>
</head>
<body>
    <header class="header">
        <div class="h-fix">
            <div class="container">
                <<?php if ($type=='index') { ?>h1 class="logo"<?php }else{  ?>div class="logo"<?php } ?>>
                    <a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">
                        <img id="light-logo" src="<?php  echo $host;  ?>zb_users/theme/suiranx_nav/image/<?php suiranx_nav_Get_Logo('logo','png'); ?>" alt="<?php  echo $name;  ?>" title="<?php  echo $name;  ?>"/>
                        <img id="dark-logo" src="<?php  echo $host;  ?>zb_users/theme/suiranx_nav/image/<?php suiranx_nav_Get_Logo('darklogo','png'); ?>" alt="<?php  echo $name;  ?>" title="<?php  echo $name;  ?>"/>                        
                    </a>
                </<?php if ($type=='index') { ?>h1<?php }else{  ?>div<?php } ?>>
                <div id="m-btn" class="m-btn"><i class="fa fa-bars"></i></div>
                <div class="search">
                    <i class="s-btn off fa fa-search"></i>
                    <div class="s-form">
                        <i class="arrow fa fa-caret-up"></i>
                        <form name="search" method="post" class="sform" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search">
                            <input class="sinput" name="q" type="text" placeholder="请输入搜索词">
                            <button><i class="fa fa-search"></i></button>
                        </form>             
                    </div>
                </div>   
                <div class="darkmode">
                    <a href="javascript:switchNightMode()" target="_self" class=""><i class="fa fa-moon-o"></i></a>
                </div>
                <nav class="nav-bar" id="nav-box" data-type="<?php  echo $type;  ?>" data-infoid="<?php if ($type=='category') { ?><?php if ($category->RootID) { ?><?php  echo $category->RootID;  ?><?php }else{  ?><?php  echo $category->ID;  ?><?php } ?><?php } ?><?php if ($type=='article') { ?><?php if ($article->Category->RootID) { ?><?php  echo $article->Category->RootID;  ?><?php }else{  ?><?php  echo $article->Category->ID;  ?><?php } ?><?php } ?><?php if ($type=='page') { ?><?php  echo $article->ID;  ?><?php } ?><?php if ($type=='tag') { ?><?php  echo $tag->ID;  ?><?php } ?>">
                    <ul class="nav">
                        <li id="nvabar-item-index"><a href="<?php  echo $host;  ?>">首页</a></li>
                        <?php  if(isset($modules['catalog'])){echo $modules['catalog']->Content;}  ?>
                    </ul>              
                </nav>
                <?php if ($zbp->Config('suiranx_nav')->submit_switch=="1") { ?>
                <div class="submit fr">
                    <?php 
                        $post=GetPost((int)$zbp->Config('suiranx_nav')->pageid);
                     ?>
                    <a href="<?php  echo $post->Url;  ?>" target="_blank" class="a transition"><i class="fa fa-heart"></i><?php  echo $zbp->Config('suiranx_nav')->btn_name;  ?></a>
                </div>   
                <?php } ?>
            </div>
        </div>
    </header>
    <div id="mask"></div>
<?php if ($type=='index') { ?>
<p class="index-breadcrumb"></p>
<?php }else{  ?>
<?php  include $this->GetTemplate('breadcrumb');  ?>
<?php } ?>