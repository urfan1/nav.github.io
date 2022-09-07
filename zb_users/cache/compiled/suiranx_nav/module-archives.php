<?php if ($style==1) { ?>
<select id="slArchives" onchange="window.location=this.options[this.selectedIndex].value">
<?php  foreach ( $urls as $url) { ?>
<option value="<?php  echo $url->Url;  ?>"><?php  echo $url->Name;  ?> (<?php  echo $url->Count;  ?>)</option>
<?php }   ?>
</select>
<?php }else{  ?>
<?php  foreach ( $urls as $url) { ?>
<li><a title="<?php  echo $url->Name;  ?>" href="<?php  echo $url->Url;  ?>"><?php  echo $url->Name;  ?> (<?php  echo $url->Count;  ?>)</a></li>
<?php }   ?>
<?php } ?>