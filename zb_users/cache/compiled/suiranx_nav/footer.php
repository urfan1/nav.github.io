
<div class="footer-copyright ">
	<div class="container">
		<p>
		    
			<?php  echo $zbp->Config('suiranx_nav')->footer_info;  ?>
            <!--统计代码-->
            <?php  echo $zbp->Config('suiranx_nav')->footer_code;  ?>
		</p>
		<img id="light-flogo" class="flogo" src="<?php  echo $host;  ?>zb_users/theme/suiranx_nav/image/<?php suiranx_nav_Get_Logo('logo','png'); ?>" alt="<?php  echo $name;  ?>" title="<?php  echo $name;  ?>"/>
		<img id="dark-flogo" class="flogo" src="<?php  echo $host;  ?>zb_users/theme/suiranx_nav/image/<?php suiranx_nav_Get_Logo('darklogo','png'); ?>" alt="<?php  echo $name;  ?>" title="<?php  echo $name;  ?>"/>		
	</div>
</div>
<!--提交和回顶-->
<?php 
    $post=GetPost((int)$zbp->Config('suiranx_nav')->pageid);
 ?>
<?php if ($zbp->Config('suiranx_nav')->submit_switch=="1") { ?>
<a id="quick_submit" class="fa fa-pencil" rel="nofollow" href="<?php  echo $post->Url;  ?>"></a>
<?php } ?>
<div id="backtop" class="fa fa-angle-up"></div>
<script src="https://cdn.staticfile.org/jquery-cookie/1.4.1/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/main.js" type="text/javascript"></script>
<!--初始化Swiper-->
<?php if ($type=='index' && $page=='1') { ?>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/swiper.js" type="text/javascript"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    centeredSlides: true,
    autoplay: 3500,
    slidesPerView: 1,
    paginationClickable: true,
    autoplayDisableOnInteraction: false,
    spaceBetween: 0,
    loop: true
});
</script>     
<?php } ?>
<script>
/* tooltip.js初始化 */
$('.autoleft').tooltip({
    align: 'autoLeft',
    fade: {
        duration: 200,
        opacity: 0.8
    }
});
</script>
<script>
/* jQuery.positionSticky.js初始化 */
jQuery('.sticky').positionSticky({offsetTop: 78});
</script>
<?php  echo $footer;  ?>
<!--[if lt IE 9]><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/html5-css3.js"></script><![endif]-->
</body>
</html>