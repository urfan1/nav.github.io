<?php
require '../../../zb_system/function/c_system_base.php';
$zbp->Load();
if (!$zbp->CheckPlugin('ly_qq')) {
    $zbp->ShowError(48);
    die();
}
ly_qq_core::Authorize();
