<!-- 后台管理输出 -->
<?php 
if (!isset($item->text)){
  $item->text = $item->name;
}
$item->text = FormatString($item->text, '[html-format]');
 ?>
<tr class="<?php if ($item->issub) { ?>LinksManageSub<?php } ?>">
  <td class="fisrt"><input class="fill-Url" name="href[]" value="<?php  echo $item->href;  ?>" size="30"></td>
  <td><input class="fill-Title" name="title[]" value="<?php  echo $item->title;  ?>" size="20"></td>
  <td><input class="fill-Title" name="text[]" value="<?php  echo $item->text;  ?>" size="20"></td>
  <td><input name="target[]" value="<?php if ($item->target == '_blank') { ?>1<?php } ?>" class="checkbox" /></td>
  <td><input name="sub[]" value="<?php if ($item->issub) { ?>1<?php } ?>" class="checkbox" /></td>
  <td><input name="ico[]" value="<?php if (isset($item->ico)) { ?><?php  echo $item->ico;  ?><?php } ?>" size="15"></td>
<tr>
<?php if (count($item->subs)) { ?>
  <?php  foreach ( $item->subs as $item) { ?><?php  include $this->GetTemplate('lm-module-admin');  ?><?php }   ?>
<?php } ?>
