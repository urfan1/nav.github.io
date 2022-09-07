<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('themeEditor')) {$zbp->ShowError(48);die();}
require './function.php';
header('Content-Type: application/json');
switch (GetVars('action', 'GET')) {
	case 'load':
		echo json_encode(loadFile(GetVars('filename', 'GET')));
		break;
	case 'save':
		echo json_encode(saveFile(GetVars('filename', 'GET'), GetVars('content', 'POST')));
		break;
	default:
		break;
}

function loadFile($fileName) {
	global $themePath;
	global $extensionToAce;
	$fileName = str_replace('..', '', $fileName);
	$return = array(
		'aceMode' => 'plain_text',
		'content' => '',
		'size' => 0,
	);
	$filePath = $themePath . $fileName;
	$extName = pathinfo($filePath, PATHINFO_EXTENSION);
	if (isset($extensionToAce[$extName])) {
		$return['aceMode'] = $extensionToAce[$extName];
	}
	if (is_file($filePath)) {
		$return['content'] = file_get_contents($filePath);
		$return['size'] = strlen($return['content']);
	}
	return $return;

}

function saveFile($fileName, $content) {

	global $themePath;
	global $extensionToAce;
	global $zbp;
	$return = array(
		'size' => 0,
	);
	$fileName = str_replace('..', '', $fileName);
	$filePath = $themePath . $fileName;
	$extName = pathinfo($filePath, PATHINFO_EXTENSION);

	if (isset($extensionToAce[$extName]) && is_file($filePath)) {
		file_put_contents($filePath, $content);
		$return['size'] = strlen($content);
		$zbp->BuildModule();
		$zbp->SaveCache();
		$zbp->BuildTemplate();
	}
	return $return;

}