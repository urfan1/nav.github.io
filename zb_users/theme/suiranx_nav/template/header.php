<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta name="force-rendering" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<meta name="applicable-device" content="pc,mobile">{template:seo}
{if $zbp->Config('suiranx_nav')->qq_card_switch=='1'}{$zbp->Config('suiranx_nav')->qq_card}{/if}

<link rel="shortcut icon" href="{$host}zb_users/theme/suiranx_nav/image/{php}suiranx_nav_Get_Logo('favicon','ico');{/php}">
<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/fontawesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/style.css?ver=3.72" type="text/css">
{if $type=='index' && $page=='1'}
<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}">
{/if}
<!--[if lt IE 9]><div class="fuck-ie"><p class="tips">*您的IE浏览器版本过低，为获得更好的体验请使用Chrome、Firefox或其他现代浏览器!</p></div><![endif]-->
<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
{$header}
</head>
<body>
    <header class="header">
        <div class="h-fix">
            <div class="container">
                <{if $type=='index'}h1 class="logo"{else}div class="logo"{/if}>
                    <a href="{$host}" title="{$name}">
                        <img id="light-logo" src="{$host}zb_users/theme/suiranx_nav/image/{php}suiranx_nav_Get_Logo('logo','png');{/php}" alt="{$name}" title="{$name}"/>
                        <img id="dark-logo" src="{$host}zb_users/theme/suiranx_nav/image/{php}suiranx_nav_Get_Logo('darklogo','png');{/php}" alt="{$name}" title="{$name}"/>                        
                    </a>
                </{if $type=='index'}h1{else}div{/if}>
                <div id="m-btn" class="m-btn"><i class="fa fa-bars"></i></div>
                <div class="search">
                    <i class="s-btn off fa fa-search"></i>
                    <div class="s-form">
                        <i class="arrow fa fa-caret-up"></i>
                        <form name="search" method="post" class="sform" action="{$host}zb_system/cmd.php?act=search">
                            <input class="sinput" name="q" type="text" placeholder="请输入搜索词">
                            <button><i class="fa fa-search"></i></button>
                        </form>             
                    </div>
                </div>   
                <div class="darkmode">
                    <a href="javascript:switchNightMode()" target="_self" class=""><i class="fa fa-moon-o"></i></a>
                </div>
                <nav class="nav-bar" id="nav-box" data-type="{$type}" data-infoid="{if $type=='category'}{if $category.RootID}{$category.RootID}{else}{$category.ID}{/if}{/if}{if $type=='article'}{if $article.Category.RootID}{$article.Category.RootID}{else}{$article.Category.ID}{/if}{/if}{if $type=='page'}{$article.ID}{/if}{if $type=='tag'}{$tag.ID}{/if}">
                    <ul class="nav">
                        <li id="nvabar-item-index"><a href="{$host}">首页</a></li>
                        {module:catalog}
                    </ul>              
                </nav>
                {if $zbp->Config('suiranx_nav')->submit_switch=="1"}
                <div class="submit fr">
                    {php}
                        $post=GetPost((int)$zbp->Config('suiranx_nav')->pageid);
                    {/php}
                    <a href="{$post.Url}" target="_blank" class="a transition"><i class="fa fa-heart"></i>{$zbp->Config('suiranx_nav')->btn_name}</a>
                </div>   
                {/if}
            </div>
        </div>
    </header>
    <div id="mask"></div>
{if $type=='index'}
<p class="index-breadcrumb"></p>
{else}
{template:breadcrumb}
{/if}