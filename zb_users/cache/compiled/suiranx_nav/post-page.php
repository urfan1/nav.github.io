
<div class="page part">
    <h1 class="tt">
        <span><?php  echo $article->Title;  ?></span>
        <span class="data fr">
            <small class="info"><i class="fa fa-clock-o"></i><?php  echo $article->Time('Y-m-d');  ?></small>
            <small class="info"><i class="fa fa-eye"></i><?php  echo $article->ViewNums;  ?></small>     
        </span>
    </h1>   
    <div class="items">
        <div class="art-main"><?php  echo $article->Content;  ?></div>
    </div>  
</div>
<?php if (!$article->IsLock) { ?> 
    <?php  include $this->GetTemplate('comments');  ?> 
    <?php }else{  ?>
    <!--<p class="comment-disable sb br mb"><i class="iconfont icon-cry"></i>抱歉，评论功能暂时关闭!</p>-->
<?php } ?>
