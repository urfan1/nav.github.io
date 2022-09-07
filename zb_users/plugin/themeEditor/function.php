<?php
$themePath = $zbp->path . 'zb_users/theme/' . $zbp->theme;
$extensionList = array();
$extensionToAce = array(
	'css' => 'css',
	'js' => 'javascript',
	'json' => 'json',
	'less' => 'less',
	'md' => 'markdown',
	'php' => 'php',
	'inc' => 'php',
	'ts' => 'typescript',
	'html' => 'html',
	'htm' => 'htm',
	'txt' => 'plain_text',
	'ejs' => 'ejs',
	'coffee' => 'coffee',
	'xml' => 'xml',
);
foreach ($extensionToAce as $extensionKey => $extensionValue) {
	$extensionList[] = $extensionKey;
}

function scanThemeDir() {
	global $zbp;
	global $extensionList;
	global $themePath;

	$return = array();
	$extensionRegEx = '/\.(' . implode('|', $extensionList) . ')$/ui';
	$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($themePath), RecursiveIteratorIterator::CHILD_FIRST);
	foreach ($iterator as $path) {
		$fileName = $path->__toString();
		if ($path->isFile()) {
			if (!preg_match('/(\/|\\\\)compile/', $fileName) && preg_match($extensionRegEx, $path)) {
				$return[] = str_replace($themePath, '', $fileName);
			}
		}
	}
	return $return;
}

function saveTheme() {

}