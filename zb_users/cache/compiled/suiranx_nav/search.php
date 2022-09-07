
<?php  include $this->GetTemplate('header');  ?>	
<style>.breadnav{display:none}.breadnav2{font-size:14px;padding:10px 0;color:#6b7386;}.breadnav2 a:hover{color:#ff3636;}.breadnav2 i{padding:0 6px;}.breadnav2 .bread{padding:10px 20px;}</style>
<div class="breadnav2">
    <div class="container bread">
        <i class="fa fa-home"></i><a title="首页" href="<?php  echo $host;  ?>">首页</a>
        <i class="fa fa-angle-right"></i><?php  echo $title;  ?> 的结果
    </div>
</div>
<div class="container">
    <div class="part">
        <div class="items">
        	<div class="row">
        		<?php  foreach ( $articles as $keyd=>$article) { ?>
                    <?php if ($article->IsTop) { ?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <div class="item">
                                <a class="link" target="_blank" href="<?php  echo $article->Url;  ?>" <?php if ($zbp->Config('suiranx_nav')->nofollow_switch) { ?>rel="nofollow"<?php } ?>><i class="autoleft fa fa-angle-right" title="查看详情"></i></a>
                                <a class="a" href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" target="_blank">
                                    <img src="<?php if (strlen ( $article->Metas->coverimg ) > 4) { ?><?php  echo $article->Metas->coverimg;  ?><?php }else{  ?><?php  echo suiranx_nav_firstimg2($article);  ?><?php } ?>" alt="<?php  echo $article->Title;  ?>" title="<?php  echo $article->Title;  ?>">
                                    <h3><span class="top-show">[顶]</span><?php  echo $article->Title;  ?></h3>
                                    <p>
                                    <?php if (strlen($article->Intro)>0) { ?>
                        				<?php $intro= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),100)).'...'; ?>
                        				<?php }else{  ?>
                        				<?php $intro= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...'; ?>
                        			<?php } ?>
                        			<?php  echo $intro;  ?></p>
                                </a>
                            </div>
                        </div>
                    <?php }else{  ?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <div class="item">
                                <a class="link" target="_blank" href="<?php  echo $article->Url;  ?>" <?php if ($zbp->Config('suiranx_nav')->nofollow_switch) { ?>rel="nofollow"<?php } ?>><i class="autoleft fa fa-angle-right" title="查看详情"></i></a>  
                                <a class="a" href="<?php if ($zbp->Config('suiranx_nav')->go_switch) { ?><?php  echo suiranx_nav_from_url($article->ID);  ?><?php }else{  ?><?php  echo $article->Url;  ?><?php } ?>" title="<?php  echo $article->Title;  ?>" target="_blank">
                                    <img src="<?php if (strlen ( $article->Metas->coverimg ) > 4) { ?><?php  echo $article->Metas->coverimg;  ?><?php }else{  ?><?php  echo suiranx_nav_firstimg2($article);  ?><?php } ?>" alt="<?php  echo $article->Title;  ?>" title="<?php  echo $article->Title;  ?>">
                                    <h3><?php  echo $article->Title;  ?></h3>
                                    <p>
                                    <?php if (strlen($article->Intro)>0) { ?>
                        				<?php $intro= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),100)).'...'; ?>
                        				<?php }else{  ?>
                        				<?php $intro= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),100)).'...'; ?>
                        			<?php } ?>
                        			<?php  echo $intro;  ?></p>
                                </a>
                            </div>
                        </div>
                    <?php } ?>                 
        		<?php }   ?>
        	</div>
        	<?php  include $this->GetTemplate('pagebar');  ?>
    	</div>
	</div>
</div>
<?php  include $this->GetTemplate('footer');  ?>
