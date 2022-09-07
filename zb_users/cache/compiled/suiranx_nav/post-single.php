
<div class="part">
    <div class="bar clearfix">
        <h1 class="tt">
           <?php if (strlen ( $article->Metas->suiranx_nav_art_name ) > 1) { ?><?php  echo $article->Title;  ?> - <?php  echo $article->Metas->suiranx_nav_art_name;  ?><?php }else{  ?><?php  echo $article->Title;  ?><?php } ?>
        </h1>  
        <div class="r-intro fr">
            <span class="data fr">
                <small class="info"><i class="fa fa-clock-o"></i><?php  echo $article->Time('Y-m-d');  ?></small>
                <small class="info"><i class="fa fa-eye"></i><?php  echo $article->ViewNums;  ?><?php  echo suiranx_nav_views($article->ID);  ?></small>
                <small class="info"><i class="fa fa-user-o"></i><?php  echo $article->Author->StaticName;  ?></small>
        		<?php if ($user->ID>0) { ?>
        		<small class="info"><i class="fa fa-pencil"></i></small>
        		<a class="float-none" target="_blank" href="<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>" rel="nofollow">编辑</a>
        		<?php } ?>        
            </span>
        </div> 
    </div>
    <div class="items">
        <div class="row post-single">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="pic fl">
                    <div class="blur blur-layer" style="background: transparent url(<?php if (strlen ( $article->Metas->coverimg ) > 4) { ?><?php  echo $article->Metas->coverimg;  ?><?php }else{  ?><?php  echo suiranx_nav_firstimg2($article);  ?><?php } ?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;animation: rotate 20s linear infinite;"> 
                    </div>
                    <img class="img-cover" src="<?php if (strlen ( $article->Metas->coverimg ) > 4) { ?><?php  echo $article->Metas->coverimg;  ?><?php }else{  ?><?php  echo suiranx_nav_firstimg2($article);  ?><?php } ?>" alt="<?php  echo $article->Title;  ?>" title="<?php  echo $article->Title;  ?>">
                </div>
                <div class="list">
                    <p>站点名称：<?php  echo $article->Title;  ?></p>
                    <p class="cate">所属分类：<a href="<?php  echo $article->Category->Url;  ?>" class="mcolor"><?php  echo $article->Category->Name;  ?></a></p>
                    <?php if ($article->Tags) { ?>
                    <p class="tag">相关标签：
                        <?php if ($article->Tags) { ?>
                    		<?php  foreach ( $article->Tags as $tag) { ?>
                    		    <span class="padding">
                    		        <a class="transition tags" href="<?php  echo $tag->Url;  ?>" title="<?php  echo $tag->Name;  ?>"># <?php  echo $tag->Name;  ?></a>
                    		    </span>
                    		<?php }   ?>
                	    <?php } ?>
                	</p>
                	<?php } ?>
                    <p class="site">官方网址：<?php  echo suiranx_nav_from_url($article->ID);  ?></p>
                    <p class="seo">SEO查询：
                        <a rel="nofollow" href="https://www.aizhan.com/cha/<?php  echo suiranx_nav_url_delete_http($article->ID);  ?>" target="_blank"><i class="fa fa-bar-chart"></i>爱站网</a>
                    <!-- 站长网pc和wap的url不一样，需做判断  -->    
                    <?php if (suiranx_nav_is_mobile()) { ?>
                        <a rel="nofollow" href="https://mseo.chinaz.com/<?php  echo suiranx_nav_url_delete_http($article->ID);  ?>" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a>    
                    <?php }else{  ?>
                        <a rel="nofollow" href="http://seo.chinaz.com/<?php  echo suiranx_nav_from_url($article->ID);  ?>" target="_blank"><i class="fa fa-bar-chart"></i>站长工具</a>    
                    <?php } ?>                          

                    </p>
                
                    
                    <a class="btn transition" target="_blank" href="<?php  echo suiranx_nav_from_url($article->ID);  ?>" <?php if ($zbp->Config('suiranx_nav')->nofollow_switch) { ?>rel="nofollow"<?php } ?>>进入网站
                    <i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>  
            <div class="col-xs-12 col-sm-12 col-md-4">
                <!-- 广告位AD2  -->
                <?php if (suiranx_nav_is_mobile()) { ?>
                    <?php if ($zbp->Config('suiranx_nav')->ad2_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->m_ad2 ) > 5) { ?>
                        <div style="margin-top:10px;"><?php  echo $zbp->Config('suiranx_nav')->m_ad2;  ?></div>
                    <?php } ?>
                <?php }else{  ?>
                    <?php if ($zbp->Config('suiranx_nav')->ad2_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->ad2 ) > 5) { ?>
                        <div><?php  echo $zbp->Config('suiranx_nav')->ad2;  ?></div>
                    <?php } ?>
                <?php } ?> 
            </div>             
        </div> 
    </div>    
</div>
<div class="part">
    <p class="tt"><span>站点介绍</span></p>  
    <div class="items">
        <div class="art-main"><?php  echo $article->Content;  ?></div>
    </div>
</div> 
<?php  include $this->GetTemplate('post-echart');  ?>
    <!-- 广告位AD3  -->
    <?php if (suiranx_nav_is_mobile()) { ?>
        <?php if ($zbp->Config('suiranx_nav')->ad3_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->m_ad3 ) > 5) { ?>
            <div style="margin-bottom:24px;"><?php  echo $zbp->Config('suiranx_nav')->m_ad3;  ?></div>
        <?php } ?>
    <?php }else{  ?>
        <?php if ($zbp->Config('suiranx_nav')->ad3_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->ad3 ) > 5) { ?>
            <div style="margin-bottom:24px;"><?php  echo $zbp->Config('suiranx_nav')->ad3;  ?></div>
        <?php } ?>
    <?php } ?>
<div class="part related">
    <p class="tt"><span>相似站点</span></p>
    <div class="items">
        <div class="row"> 
            <?php if (strlen ( $article->Tag ) > 0) { ?>
            <?php  foreach ( GetList(8,null,null,null,null,null,array('is_related'=>$article->ID)) as $related) { ?>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="item">
                        <a class="link" target="_blank" href="<?php  echo suiranx_nav_from_url($related->ID);  ?>" rel="nofollow"><i class="autoleft fa fa-angle-right" title="直达网站"></i></a>
                        <a class="a" href="<?php  echo $related->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank">
                            <img class="img-cover br" src="<?php if (strlen ( $related->Metas->coverimg ) > 4) { ?><?php  echo $related->Metas->coverimg;  ?><?php }else{  ?><?php  echo suiranx_nav_firstimg2($related);  ?><?php } ?>" alt="<?php  echo $related->Title;  ?>" title="<?php  echo $related->Title;  ?>">
                            <h3><?php  echo $related->Title;  ?></h3>
                            <p>
                            <?php if (strlen($related->Intro)>0) { ?>
                				<?php $intro= trim(SubStrUTF8(TransferHTML($related->Intro,'[nohtml]'),100)).'...'; ?>
                				<?php }else{  ?>
                				<?php $intro= trim(SubStrUTF8(TransferHTML($related->Content,'[nohtml]'),100)).'...'; ?>
                			<?php } ?>
                			<?php  echo $intro;  ?></p>
                        </a>
                    </div>
                </div>  
                <?php }   ?>
                <?php }else{  ?>
                <?php  foreach ( GetList(8,$article->Category->ID) as $newlist) { ?>
                  
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="item">
                        <a class="link" target="_blank" href="<?php  echo suiranx_nav_from_url($newlist->ID);  ?>" rel="nofollow"><i class="autoleft fa fa-angle-right" title="直达网站"></i></a>
                        <a class="a" href="<?php  echo $newlist->Url;  ?>" title="<?php  echo $newlist->Title;  ?>" target="_blank">
                            <img class="img-cover br" src="<?php if (strlen ( $newlist->Metas->coverimg ) > 4) { ?><?php  echo $newlist->Metas->coverimg;  ?><?php }else{  ?><?php  echo suiranx_nav_firstimg2($newlist);  ?><?php } ?>" alt="<?php  echo $newlist->Title;  ?>" title="<?php  echo $newlist->Title;  ?>">
                            <h3><?php  echo $newlist->Title;  ?></h3>
                            <p>
                            <?php if (strlen($newlist->Intro)>0) { ?>
                				<?php $intro= trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),100)).'...'; ?>
                				<?php }else{  ?>
                				<?php $intro= trim(SubStrUTF8(TransferHTML($newlist->Content,'[nohtml]'),100)).'...'; ?>
                			<?php } ?>
                			<?php  echo $intro;  ?></p>
                        </a>
                    </div>
                </div>
            <?php }   ?>
            <?php } ?>  
        </div> 
    </div>
</div>
<?php if (!$article->IsLock) { ?> 
    <?php  include $this->GetTemplate('comments');  ?> 
    <?php }else{  ?>
    <!--<p class="comment-disable sb br mb"><i class="iconfont icon-cry"></i>抱歉，评论功能暂时关闭!</p>-->
<?php } ?>