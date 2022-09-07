<table id="tbCalendar">
    <caption><a title="<?php  echo $lang['msg']['prev_month'];  ?>" href="<?php  echo $prevMonthUrl;  ?>">«</a>&nbsp;&nbsp;&nbsp;<a href="<?php  echo $nowMonthUrl;  ?>">
<?php if ($option['ZC_BLOG_LANGUAGEPACK'] == 'zh-cn' || $option['ZC_BLOG_LANGUAGEPACK'] == 'zh-tw') { ?>
    <?php echo str_replace(array('%y%', '%m%'), array($nowYear, $nowMonth), $lang['msg']['year_month']); ?>
<?php }else{  ?>
    <?php  echo date("F , Y", mktime(0, 0, 0, $nowMonth, 1, $nowYear));  ?>
<?php } ?>
    </a>&nbsp;&nbsp;&nbsp;<a title="<?php  echo $lang['msg']['next_month'];  ?>" href="<?php  echo $nextMonthUrl;  ?>">»</a></caption>
    <thead><tr><?php  for( $i = 1; $i <= 7; $i++) { ?> <th title="<?php  echo $lang['week'][$i];  ?>" scope="col"><small><?php  echo $lang['week_abbr'][$i];  ?></small></th><?php  }   ?></tr></thead>
    <tbody>
    <?php 
    $days = date('t', strtotime($date)); //一个月多少天
    $dayOfWeek = date('N', strtotime($date . '-1')); //1号是星期几
    $numberOfDays = range(1,$days);
    $weeks = array_chunk(array_pad($numberOfDays, -1 * $days - --$dayOfWeek, 0), 7);
     ?>
    <?php  foreach ( $weeks as $key => $week) { ?>
<tr><?php  foreach ( $week as $k => $day) { ?><td><?php if (isset($arraydate[$day])) { ?><a href="<?php  echo $arraydate[$day]['Url'];  ?>" title="<?php  echo $arraydate[$day]['Date'];  ?> (<?php  echo $arraydate[$day]['Count'];  ?>)" target="_blank"><?php  echo $day;  ?></a><?php }elseif($day) {  ?><?php  echo $day;  ?><?php } ?></td><?php }   ?>
<?php if ($key == max(array_keys($weeks)) && $k < 6) { ?><?php  echo str_pad('',(7 - count($week)) * 9,"<td></td>");  ?><?php } ?></tr>
    <?php }   ?>
	</tbody>
</table>