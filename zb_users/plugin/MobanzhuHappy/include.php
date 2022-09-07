<?php
#注册插件
RegisterPlugin("MobanzhuHappy","ActivePlugin_MobanzhuHappy");

function ActivePlugin_MobanzhuHappy() {
    Remove_Filter_Plugin('Filter_Plugin_Cmd_Begin','AppCentre_Cmd_Begin');
}
function InstallPlugin_MobanzhuHappy() {}
function UninstallPlugin_MobanzhuHappy() {}