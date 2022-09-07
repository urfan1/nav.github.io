
<?php  /* Template Name:文章详情页模板 */  ?>
<?php  include $this->GetTemplate('header');  ?>
<div class="container">
    <div class="part">
        <div class="bar clearfix">
            <h1 class="tt"><?php  echo $article->Title;  ?></h1>   
            <div class="r-intro fr">
                <span class="data fr">
                    <small class="info"><i class="fa fa-clock-o"></i><?php  echo $article->Time('Y-m-d');  ?></small>
                    <small class="info"><i class="fa fa-eye"></i><?php  echo $article->ViewNums;  ?></small>
                    <small class="info"><i class="fa fa-user-o"></i><?php  echo $article->Author->StaticName;  ?></small>
            		<?php if ($user->ID>0) { ?>
            		<small class="info"><i class="fa fa-pencil"></i></small>
            		<a class="float-none" target="_blank" href="<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>" rel="nofollow">编辑</a>
            		<?php } ?>        
                </span>  
            </div>    
        </div> 
        <div class="items">
            <div class="art-main">
                <?php  echo $article->Content;  ?>
                <div class="art-copyright br mb">
    			    <div>本文地址：<a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank"><?php  echo $article->Url;  ?></a></div>
    			    <div><span class="copyright">版权声明：</span>除非特别标注，否则均为本站原创文章，转载时请以链接形式注明文章出处。</div>
    		    </div> 
                <?php if ($article->Tags) { ?>
                <p class="art-tag">相关标签：
                    <?php if ($article->Tags) { ?>
                		<?php  foreach ( $article->Tags as $tag) { ?>
                		    <span class="padding">
                		        <a class="transition tags" href="<?php  echo $tag->Url;  ?>" title="<?php  echo $tag->Name;  ?>"># <?php  echo $tag->Name;  ?></a>
                		    </span>
                		<?php }   ?>
            	    <?php } ?>
            	</p>
            	<?php } ?>
            </div>
    		          
        </div>
    </div>
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
        <p class="tt"><span>相关推荐</span></p>
        <div class="items">
            <div class="row"> 
                    <?php  foreach ( GetList(8,$article->Category->ID) as $newlist) { ?>
                      
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="item art-item transition">
                            <a class="art-a" href="<?php  echo $newlist->Url;  ?>" title="<?php  echo $newlist->Title;  ?>" target="_blank">
                                <img class="img-cover" src="<?php if (strlen ( $newlist->Metas->coverimg ) > 4) { ?><?php  echo $newlist->Metas->coverimg;  ?><?php }else{  ?><?php  echo suiranx_nav_firstimg($newlist);  ?><?php } ?>" alt="<?php  echo $newlist->Title;  ?>" title="<?php  echo $newlist->Title;  ?>">
                            </a>
                            <h3><a class="" href="<?php  echo $newlist->Url;  ?>" title="<?php  echo $newlist->Title;  ?>" target="_blank"><?php  echo $newlist->Title;  ?></a></h3>
                            <p>
                            <?php if (strlen($newlist->Intro)>0) { ?>
                    			<?php $intro= trim(SubStrUTF8(TransferHTML($newlist->Intro,'[nohtml]'),100)).'...'; ?>
                    			<?php }else{  ?>
                    			<?php $intro= trim(SubStrUTF8(TransferHTML($newlist->Content,'[nohtml]'),100)).'...'; ?>
                    		<?php } ?>
                    		<?php  echo $intro;  ?></p>
                            
                        </div>
                    </div>
                <?php }   ?>
            </div> 
        </div>
    </div>
    <?php if (!$article->IsLock) { ?> 
        <?php  include $this->GetTemplate('comments');  ?> 
        <?php }else{  ?>
        <!--<p class="comment-disable sb br mb"><i class="iconfont icon-cry"></i>抱歉，评论功能暂时关闭!</p>-->
    <?php } ?>
</div>
<?php  include $this->GetTemplate('footer');  ?>
