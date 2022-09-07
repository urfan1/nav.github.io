<?php  foreach ( $articles as $article) { ?>
<li><a title="<?php  echo $article->Title;  ?>" href="<?php  echo $article->Url;  ?>"><?php  echo $article->Title;  ?></a></li>
<?php }   ?>