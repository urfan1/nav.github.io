<?php  include $this->GetTemplate('header');  ?>
<?php if ($zbp->Config('suiranx_nav')->bear_switch=="1") { ?>
<div id="banner-bear" class="preserve3d csstransforms3d">
    <p class="typing web-font transition"><?php  echo $zbp->Config('suiranx_nav')->slogan;  ?></p>
    <?php if ($zbp->Config('suiranx_nav')->search_switch=="1") { ?>
    <div class="primary-menus">
        <ul class="selects">
            <li>常用</li>
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_1 ) > 1) { ?>
            <li class="current" data-target="search_1"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_1;  ?></span></li><?php } ?>
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_2 ) > 1) { ?>
            <li data-target="search_2"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_2;  ?></span></li><?php } ?>
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_3 ) > 1) { ?>
            <li data-target="search_3"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_3;  ?></span></li><?php } ?>  
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_4 ) > 1) { ?>
            <li data-target="search_4"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_4;  ?></span></li><?php } ?>  
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_5 ) > 1) { ?>
            <li data-target="search_5"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_5;  ?></span></li><?php } ?> 
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_6 ) > 1) { ?>
            <li data-target="search_6"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_6;  ?></span></li><?php } ?>  
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_7 ) > 1) { ?>
            <li data-target="search_7"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_7;  ?></span></li><?php } ?> 
            <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_8 ) > 1) { ?>
            <li data-target="search_8"><span><?php  echo $zbp->Config('suiranx_nav')->search_name_8;  ?></span></li><?php } ?> 
        </ul>
        <div class="cont">
            <div class="left-cont">
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_1 ) > 1) { ?>
                <form class="search" id="search_1" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_1;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_1;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_1;  ?>搜索</button>
                </form>
                <?php } ?>
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_2 ) > 1) { ?>
                <form class="search hidden" id="search_2" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_2;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_2;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_2;  ?>搜索</button>
                </form>
                <?php } ?>
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_3 ) > 1) { ?>
                <form class="search hidden" id="search_3" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_3;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_3;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_3;  ?>搜索</button>
                </form>  
                <?php } ?>
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_4 ) > 1) { ?>
                <form class="search hidden" id="search_4" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_4;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_4;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_4;  ?>搜索</button>
                </form> 
                <?php } ?>
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_5 ) > 1) { ?>
                <form class="search hidden" id="search_5" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_5;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_5;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_5;  ?>搜索</button>
                </form>   
                <?php } ?>
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_6 ) > 1) { ?>
                <form class="search hidden" id="search_6" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_6;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_6;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_6;  ?>搜索</button>
                </form>   
                <?php } ?>
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_7 ) > 1) { ?>
                <form class="search hidden" id="search_7" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_7;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_7;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_7;  ?>搜索</button>
                </form>
                <?php } ?>
                <?php if (strlen ( $zbp->Config('suiranx_nav')->search_name_8 ) > 1) { ?>
                <form class="search hidden" id="search_8" action="<?php  echo $zbp->Config('suiranx_nav')->search_url_8;  ?>" method="get" target="_blank">  
                    <input type="text" name="<?php  echo $zbp->Config('suiranx_nav')->name_8;  ?>" class="s" placeholder="请输入关键词">
                    <button type="submit" name="" class="btn"><?php  echo $zbp->Config('suiranx_nav')->search_name_8;  ?>搜索</button>
                </form>                
                <?php } ?>
            </div>
        </div>
    </div> 
    <?php } ?>
    <div class="submit fr">
        <?php 
            $post=GetPost((int)$zbp->Config('suiranx_nav')->pageid);
         ?>
        <a href="<?php  echo $post->Url;  ?>" target="_blank" class="a transition"><i class="fa fa-heart"></i><?php  echo $zbp->Config('suiranx_nav')->btn_name;  ?></a>
    </div>     
	<div class="banner-wrap scenes-ready">
		<div id="stage">
			<div class="space"></div>
			<div class="mountains">
				<div class="mountain mountain-1"></div>
				<div class="mountain mountain-2"></div>
				<div class="mountain mountain-3"></div>
			</div>
			<div class="bear"></div>
		</div>
	</div>
</div>
<?php } ?>  
<?php if ($zbp->Config('suiranx_nav')->slider_switch=="1") { ?>
    <div class="container">
	<?php if ($type=='index'&&$page=='1') { ?> 
        <?php  include $this->GetTemplate('slider');  ?>
    <?php } ?>
    </div>
<?php } ?>
<div class="container">
    <!-- 广告位AD1  -->
    <?php if (suiranx_nav_is_mobile()) { ?>
        <?php if ($zbp->Config('suiranx_nav')->ad1_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->m_ad1 ) > 5) { ?>
            <div style="margin:20px 0;"><?php  echo $zbp->Config('suiranx_nav')->m_ad1;  ?></div>
        <?php } ?>
    <?php }else{  ?>
        <?php if ($zbp->Config('suiranx_nav')->ad1_switch=="1" && strlen ( $zbp->Config('suiranx_nav')->ad1 ) > 5) { ?>
            <div style="margin:20px 0;"><?php  echo $zbp->Config('suiranx_nav')->ad1;  ?></div>
        <?php } ?>
    <?php } ?>    
    <!-- 收录统计  -->
    <?php if ($zbp->Config('suiranx_nav')->data_switch=="1") { ?>
    <div class="data-zone">总共收录:<span class="num"><?php  echo $zbp->cache->all_article_nums;  ?></span>个&nbsp;&nbsp;&nbsp;今日收录:<span class="num"><?php  echo suiranx_nav_postNum();  ?></span>个
    &nbsp;&nbsp;&nbsp;待审网站:<span class="num"><?php  echo suiranx_nav_passNum();  ?></span>个&nbsp;&nbsp;&nbsp;总访问量:<span class="num"><?php  echo $zbp->cache->all_view_nums;  ?></span>次
    </div>
    <?php } ?>
	<div <?php if ($zbp->Config('suiranx_nav')->fast_nav_switch=="1") { ?> class="row same-height row-position"<?php }else{  ?> class="row row-position"<?php } ?>> 
            	
	    <?php if ($zbp->Config('suiranx_nav')->fast_nav_switch=="1") { ?>
   		<div class="col-md-1 quick-nav" >
            <div class="content-sidebar same-height-l">
            <dl id="goto"></dl></div>
        </div>   
        <?php } ?>
 
        <div <?php if ($zbp->Config('suiranx_nav')->fast_nav_switch=="1") { ?> class="col-md-12 same-height-r"<?php }else{  ?> class="col-md-12"<?php } ?>>
		<?php $cate_id = explode(',',$zbp->Config('suiranx_nav')->cate_id); ?>
   		<?php  foreach ( $cate_id as $key=>$id) { ?>
   		<?php  $i = $key+1;  ?>
   		<?php if (isset($categorys[$id])) { ?>
   		
   		
        <div class="part" id="cate<?php  echo $id;  ?>" data-title="<?php  echo $categorys[$id]->Name;  ?>">
            <p class="tt sticky">
                <strong><?php  echo $categorys[$id]->Name;  ?></strong>
                <a title="更多<?php  echo $categorys[$id]->Name;  ?>的内容" href="<?php  echo $categorys[$id]->Url;  ?>">更多+</a>
            </p>
            <div class="items">
                <div class="row">
                    <?php  include $this->GetTemplate('index-cat');  ?>
                </div>
            </div>
        </div>   		
   		

        <?php } ?>
		<?php }   ?>
        </div>     
	</div> 
	
    <?php if ($zbp->Config('suiranx_nav')->flink_switch=='1') { ?>
    <div class="f-link part">
        <p class="tt"><strong>友情链接</strong></p>    
        <ul id="flink" class="container"><?php  if(isset($modules['link'])){echo $modules['link']->Content;}  ?></ul>
    </div>
    <?php } ?>  
</div>


<?php  include $this->GetTemplate('footer');  ?>