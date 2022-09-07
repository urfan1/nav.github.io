<li class="<?php  echo $id;  ?>-item">
  <a href="<?php  echo $item->href;  ?>" target="<?php  echo $item->target;  ?>" title="<?php  echo $item->title;  ?>"><?php  echo $item->ico;  ?><?php  echo $item->text;  ?></a>
  <?php if (count($item->subs)) { ?>
  <ul><?php  foreach ( $item->subs as $item) { ?><?php  include $this->GetTemplate('lm-module-defend');  ?><?php }   ?></ul>
  <?php } ?>
</li>
