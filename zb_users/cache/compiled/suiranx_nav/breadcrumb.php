
<div class="breadnav">
    <div class="container bread">
        <i class="fa fa-home"></i><a title="首页" href="<?php  echo $host;  ?>">首页</a>
        <?php if ($type=='category') { ?><i class="fa fa-angle-right"></i><a href="<?php  echo $category->Url;  ?>" target="_blank"><?php  echo $category->Name;  ?></a><?php } ?>
        <?php if ($type=='article') { ?><i class="fa fa-angle-right"></i><a href="<?php  echo $article->Category->Url;  ?>" target="_blank"><?php  echo $article->Category->Name;  ?></a><i class="fa fa-angle-right"></i>内容详情<?php } ?>
        <?php if ($type=='page') { ?><i class="fa fa-angle-right"></i><?php  echo $title;  ?><?php } ?>
        <?php if ($type=='author') { ?><i class="fa fa-angle-right"></i><?php  echo $title;  ?>发布的内容<?php } ?>
        <?php if ($type=='date') { ?><i class="fa fa-angle-right"></i><?php  echo $title;  ?>发布的内容<?php } ?>
        <?php if ($type=='tag') { ?><i class="fa fa-angle-right"></i>包含"<?php  echo $title;  ?>"标签的内容<?php } ?>
    </div>
</div>
