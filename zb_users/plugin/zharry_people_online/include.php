<?php
#注册插件
RegisterPlugin("zharry_people_online","ActivePlugin_zharry_people_online");

function ActivePlugin_zharry_people_online() {Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','zharry_people_online_main');}

function zharry_people_online_main(){
global $zbp;

$time = time();
$ip = zharry_people_online_getIpAddress();
$zbp->footer .= '当前在线 '.zharry_people_online_num($time,$ip).' 人' . "\r\n";

}
function zharry_people_online_getIpAddress() { // 取得当前用户的IP地址
 if (getenv('HTTP_CLIENT_IP')) {
 $ip = getenv('HTTP_CLIENT_IP');
 } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
 $ip = getenv('HTTP_X_FORWARDED_FOR');
 } elseif (getenv('REMOTE_ADDR')) {
 $ip = getenv('REMOTE_ADDR');
 } else {
 $ip = $_SERVER['REMOE_ADDR'];
 } 
 return $ip;
} 
function zharry_people_online_writeover($filename,$data,$method = 'w',$chmod = 0){
 $handle = fopen($filename, $method);
 !$handle && die("文件打开失败");
 flock($handle, LOCK_EX);
 fwrite($handle, $data);
 flock($handle, LOCK_UN);
 fclose($handle);
 $chmod && @chmod($filename, 0777);
} 
function zharry_people_online_num($time, $ip) {
 $fileCount = 'count.txt';
 $count = 0;
 $gap = 900; //15分钟不刷新页面就
 if (!file_exists($fileCount)) {
 $str = $time . "\t" . $ip . "\r\n";
 zharry_people_online_writeover($fileCount, $str, 'w', 1);
 $count = 1;
 } else {
 $arr = file($fileCount);
 $flag = 0;
 foreach($arr as $key => $val) {
  $val= trim($val);
  if ($val != "") {
  list($when, $seti) = explode("\t", $val);
  if ($seti ==$ip) {
   $arr[$key] = $time . "\t" . $seti;
   $flag = 1;
  } else {
   $currentTime = time();
   if ($currentTime - $when > 900) {
   unset($arr[$key]);
   }else{
   $arr[$key]=$val;
   }
  } 
  } 
 } 
 if ($flag == 0) {
  array_push($arr, $time . "\t" . $ip);
 } 
 $count = count($arr);
 $str = implode("\r\n", $arr);
 $str.="\r\n";
 zharry_people_online_writeover($fileCount, $str, 'w', 0);
 unset($arr);
 } 
 return $count;
} 

function InstallPlugin_zharry_people_online() {}
function UninstallPlugin_zharry_people_online() {}