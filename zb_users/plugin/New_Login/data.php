<?php        		       	  	 	 
require '../../../zb_system/function/c_system_base.php';     	  	
$zbp->Load();          	  
$action='root';    		 	  	      	 	 			
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}      		  	     		     	
if (!$zbp->CheckPlugin('New_Login')) {$zbp->ShowError(48);die();} 
if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();

$zbp->Config('New_Login')->template= (int)$_POST['template'];
$zbp->Config('New_Login')->isRefresh= (int)$_POST['isRefresh'];
$zbp->SaveConfig('New_Login');
$zbp->SetHint('good','保存成功');
Redirect('./main.php');