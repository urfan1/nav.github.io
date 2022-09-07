
<?php  include $this->GetTemplate('header');  ?>
<div class="container">
	<?php if ($article->Type==0) { ?>
    <?php  include $this->GetTemplate('post-single');  ?>
    <?php }else{  ?>
    <?php  include $this->GetTemplate('post-page');  ?>
    <?php } ?>
</div>
<?php  include $this->GetTemplate('footer');  ?>