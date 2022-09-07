<?php
#注册插件
RegisterPlugin("themeEditor", "ActivePlugin_themeEditor");

function ActivePlugin_themeEditor() {
	Add_Filter_Plugin('Filter_Plugin_Admin_ThemeMng_SubMenu', 'themeEditor_Admin_ThemeMng_SubMenu');
}
function InstallPlugin_themeEditor() {}
function UninstallPlugin_themeEditor() {}

function themeEditor_Admin_ThemeMng_SubMenu() {
	global $zbp;
	echo '<a href="' . $zbp->host . 'zb_users/plugin/themeEditor/main.php';
	echo '"><span class="m-left">编辑主题</span></a>';

}