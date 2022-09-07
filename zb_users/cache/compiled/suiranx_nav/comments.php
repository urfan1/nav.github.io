
<?php if ($socialcomment) { ?>
<?php  echo $socialcomment;  ?>
<?php }else{  ?>
<div class="part">
    <ul class="msg msghead">
    	<li class="tbname">
    	    <p class="tt">
                <span>评论列表
                    <?php if ($article->CommNums==0) { ?>
                    （<span class="emphasize">0</span>条）
                    <?php }else{  ?>
                    （<span class="emphasize"><?php  echo $article->CommNums;  ?></span>条）
                    <?php } ?>            
                </span>
            </p>
        </li>
    </ul>
    <div class="items">
        <?php if ($article->CommNums==0) { ?><i class="fa fa-smile-o"></i>&nbsp;暂无评论，快来抢沙发吧~<?php } ?>
        <label id="AjaxCommentBegin"></label>
        <!--评论输出-->
        <?php  foreach ( $comments as $key => $comment) { ?>
        <?php  include $this->GetTemplate('comment');  ?>
        <?php }   ?>
    
        <!--评论翻页条输出-->
        <div class="pagebar commentpagebar">
        <?php  include $this->GetTemplate('pagebar');  ?>
        </div>
        <label id="AjaxCommentEnd"></label>
    </div>
</div>
<!--评论框-->
<?php  include $this->GetTemplate('commentpost');  ?>

<?php } ?>