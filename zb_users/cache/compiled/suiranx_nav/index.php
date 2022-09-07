
<?php if ($type=='index') { ?>
    <?php  include $this->GetTemplate('index-content');  ?>
<?php }elseif($type=='category') {  ?>
    <?php 
    $cateid = $category->ID;
    $cate_id2 = $zbp->Config( 'suiranx_nav' )->cate_id2;
    $pattern = '/(^|,)'.$cateid.'(,|$)/';
     ?>
	<?php if (preg_match($pattern, $cate_id2)) { ?>
	<?php  include $this->GetTemplate('post-cat-art');  ?>
	<?php }else{  ?>
	<?php  include $this->GetTemplate('post-cat');  ?>
	<?php } ?>
<?php }else{  ?>
	<?php  include $this->GetTemplate('post-cat');  ?>
<?php } ?>