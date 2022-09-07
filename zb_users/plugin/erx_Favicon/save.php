<?php
//Favicon站标设置插件 www.yiwuku.com erx@qq.com
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('erx_Favicon')) {$zbp->ShowError(48);die();}
if($_GET['type'] == 'favicon'){
	global $zbp;
	foreach ($_FILES as $key => $value) {
		if(!strpos($key, "_php")){
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
				$tmp_name = $_FILES[$key]['tmp_name'];
				$name = $_FILES[$key]['name'];
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir.'upload/favicon.ico');
			}
		}
	}
	$zbp->SetHint('good','favicon上传成功');
	Redirect('main.php');
}
if($_GET['type'] == 'apple'){
	global $zbp;
	foreach ($_FILES as $key => $value) {
		if(!strpos($key, "_php")){
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
				$tmp_name = $_FILES[$key]['tmp_name'];
				$name = $_FILES[$key]['name'];
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir.'upload/apple.png');
			}
		}
	}
	$zbp->SetHint('good','IOS图标上传成功');
	Redirect('main.php');
}
?>