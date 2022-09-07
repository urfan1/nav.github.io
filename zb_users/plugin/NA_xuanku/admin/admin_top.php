<?php
if (isset($_POST['Forum'])) {
    foreach ($_POST['Forum'] as $key => $val) {
        $zbp->Config('NA_xuanku')->$key = $val;
    }

    if ($key == "bdclass") {
        $bdclass = explode("\r\n", $val);
        $bdclass = array_filter($bdclass);
        $s = array();
        $s[] = '$(document).ready(function(){';
        foreach ($bdclass as $l) {
            $l_g = explode("|", $l);
            $l_g = array_filter($l_g);
            if (isset($l_g[0]) && isset($l_g[1])) {
                if ($l_g[0] != '' && $l_g[1] != '') {
                    $s[] = '$("' . $l_g[0] . '").addClass("' . $l_g[1] . '");';
                }
            }
        }
        $s[] = 'new WOW().init();
});';
        $s_j = implode(PHP_EOL, $s);
        $s2 = $zbp->path . 'zb_users/plugin/NA_xuanku/view/com.js';
        @file_put_contents($s2, $s_j);
        $zbp->Config('NA_xuanku')->get_js = $s_j;
    }
    $zbp->SaveConfig('NA_xuanku');
    $zbp->ShowHint('good');
}
?>
<div class="divHeader"><?php echo $blogtitle; ?></div>
<div class="SubMenu">
    <?php echo NA_xuanku_SubMenu($setid) ?>
</div>
<table width="100%" style='padding:0;margin:0;margin-bottom: 5px;' cellspacing='0' cellpadding='0' class="tableBorder">
    <tr>
        <td><label>
                <p><strong style="color:#F00">温馨提示：</strong>NewAPP www.newapp.cc QQ 客服为：3033576915 可以点击上面的 "QQ联系帮助"
                    按钮找到我。</p>
            </label></td>
    </tr>
</table>
	