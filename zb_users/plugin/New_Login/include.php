<?php
#注册插件

RegisterPlugin("New_Login","ActivePlugin_New_Login");
$plugincfg = $zbp->Config('New_Login');
function ActivePlugin_New_Login() {
    Add_Filter_Plugin('Filter_Plugin_Login_Header', 'New_Login_Setting');
    Add_Filter_Plugin('Filter_Plugin_Zbp_BuildTemplate','New_Login_Temp'); 
    Add_Filter_Plugin('Filter_Plugin_Index_Begin', 'New_Login_Index_Begin');
    Add_Filter_Plugin('Filter_Plugin_VerifyLogin_Succeed', 'New_Login_VerifyLogin_Succeed');
	Add_Filter_Plugin('Filter_Plugin_Admin_ThemeMng_SubMenu', 'New_Login_ThemeMng_SubMenu');
	
}

function New_Login_ThemeMng_SubMenu() {
	global $zbp;
	echo '<a href="' . $zbp->host . 'zb_users/plugin/New_Login/main.php';
	echo '"><span class="m-left">炫酷登录模板</span></a>';
}

function New_Login_VerifyLogin_Succeed() {
	global $zbp,$plugincfg;
	$rUrl = ($plugincfg->rUrl) ? $plugincfg->rUrl : "zb_system/cmd.php?act=admin";
	Redirect($rUrl);
}

function New_Login_Temp(&$templates) {
    global $zbp;  
    for($i=0; $i<=17; $i++){
    	$array[] = 'Login_'.$i;
    }
    $New_Login_templates = $array;       
    $New_Login_theme = 'New_Login';    
    if( is_array($New_Login_templates) && count($New_Login_templates) && $New_Login_theme ){         
        foreach($New_Login_templates as $vo){           
            $fullname=$zbp->usersdir .'plugin/'.$New_Login_theme.'/template/'.$vo.'.php';
            $templates[$vo] = file_get_contents($fullname);        
        }          
    } 
}

function New_Login_Index_Begin() {
    global $zbp,$plugincfg; 
    $temp = $plugincfg->template;
    if (file_exists($zbp->path . "zb_users/cache/compiled/" . $zbp->option['ZC_BLOG_THEME'] . "/Login_{$temp}.php") == false) {
        return;
    }
    $newUrl = ($plugincfg->newUrl) ? $plugincfg->newUrl : "NewLogin";
	if (isset($_GET[$newUrl])) {
		if (isset($_GET['style']) && $zbp->CheckRights('admin')) {
			New_Login_Main($_GET['style']);
		} else {
			if ($zbp->CheckRights('admin')) {
				Redirect('zb_system/cmd.php?act=admin');
			}
			New_Login_Main();
		}
		die();
	}
}

function New_Login_Main($style = null) {
    global $zbp,$plugincfg; 
    $article = new Post;           
    $article->Title='登录 - '.$zbp->name;    	
    $article->IsLock=true;                
    $article->Type=ZC_POST_TYPE_PAGE;
    $temp = $plugincfg->template;
    if (is_null($style)) {
    	if ($zbp->template->hasTemplate('Login_'.$temp)){
    		$article->Template = 'Login_'.$temp;
    	}  
    } else {
    	$article->Template = 'Login_'.$style;
    }
    $zbp->template->SetTags('G2Fa',''); 
    if($zbp->CheckPlugin('LiangbuLogin')){                        
        $zbp->template->SetTags('G2Fa','<input type="text" id="googleauth" name="googleauth"  placeholder="两步验证" class="input" />');    
    } 
    $zbp->template->SetTags('homepage','');
    $zbp->template->SetTags('invitecode',''); 
    $zbp->template->SetTags('verifycode','');
    if($zbp->CheckPlugin('RegPage')){ 
    	$hash = sha1($zbp->guid . GetVars('REMOTE_ADDR', 'SERVER'));
    	$zbp->validcodeurl = $zbp->host . 'zb_users/plugin/RegPage/c_validcode.php' . '?hash=' . $hash;
    	$RegPage_Table = '%pre%regpage';
        $RegPage_DataInfo = array(
     	   'ID'         => array('reg_ID', 'integer', '', 0),
     	   'InviteCode' => array('reg_InviteCode', 'string', 50, ''),
     	   'Level'      => array('reg_Level', 'integer', '', 5),
     	   'AuthorID'   => array('reg_AuthorID', 'integer', '', 0),
     	   'IsUsed'     => array('reg_IsUsed', 'boolean', '', false),
     	   'Intro'      => array('reg_Intro', 'string', '', ''),
     	   'IP'         => array('reg_IP', 'string', 50, ''),
     	   'Time'       => array('reg_Time', 'integer', '', 0),
    	);
    	$sql = $zbp->db->sql->Select($RegPage_Table, '*', array(array('=', 'reg_AuthorID', 0)), null, array(100), null);
    	$array = $zbp->GetListCustom($RegPage_Table, $RegPage_DataInfo, $sql);
    	$num = count($array);if ($num == 0) {$invitecode = '<p>邀请码派发完了</p>';} else {$invitecode = '<input type="hidden" name="reg_invitecode" value="'.$array[mt_rand(0, $num - 1)]->InviteCode.'" class="input" />';}
        $zbp->template->SetTags('invitecode',$invitecode);  
        if ($zbp->Config('RegPage')->disable_website != true) {
        	$zbp->template->SetTags('homepage','<input type="text" name="reg_homepage" placeholder="网站" class="input" />');  
        }
        if ($zbp->Config('RegPage')->disable_validcode != true) {
        	$zbp->template->SetTags('verifycode','<input required="required" type="text" name="reg_verifycode" placeholder="验证码" class="input" />&nbsp;&nbsp;<img id="verfiycode" src="' . $zbp->validcodeurl . '&amp;id=RegPage" alt="" title="" onclick="javascript:this.src=\'' . $zbp->validcodeurl . '&amp;id=RegPage&amp;tm=\'+Math.random();"/>');
        }
    } 
    $zbp->template->SetTags('csrfToken','');
    if (function_exists('CheckIsRefererValid')) {$zbp->template->SetTags('csrfToken','<input type="hidden" name="csrfToken" value="'.$zbp->GetCSRFToken().'">');}
    $zbp->template->SetTags('title',$article->Title);            
    $zbp->template->SetTags('article',$article);     
    $zbp->template->SetTags('type','page');         
    $zbp->template->SetTemplate($article->Template);  
    $zbp->template->SetTags('page',1);            
    $zbp->template->SetTags('pagebar',null);   
    $zbp->template->SetTags('comments',array());  
    $zbp->template->Display();  
}

function New_Login_Setting() {
    global $zbp,$plugincfg;
    $temp = $plugincfg->template;
    if (file_exists($zbp->path . "zb_users/cache/compiled/" . $zbp->option['ZC_BLOG_THEME'] . "/Login_{$temp}.php") == false) {
        return;
    }
    if($plugincfg->isOff == 1) {
    	$zbp->ShowError(2);die();
    }
    if(isset($_GET['act']) && $_GET['act'] == 'off') {
    	return;
    }else{
        Redirect($zbp->host .'?NewLogin');
    }
    //if (!$zbp->CheckPlugin('RegPage')) {$zbp->ShowHint('bad', '请您安装或启用注册插件！');}
    
}
function InstallPlugin_New_Login() {
	global $zbp,$plugincfg;
    if (!$plugincfg->HasKey('Version')) {
        $array = array(
            'Version'        => '1.0',
            'adminstyle'     => '0',
            'adminlogo'      => '',
            'jqkeyboard'     => '0',
            'clearSetting'   => '1',
            'template'       => '2',
        );
        foreach ($array as $value => $intro) {
            $plugincfg->$value = $intro;
        }
	}
    $zbp->SaveConfig('New_Login');
    $zbp->BuildTemplate();
}

function UninstallPlugin_New_Login(){
	global $zbp,$plugincfg;
	if ($plugincfg->clearSetting == 0){
		$zbp->DelConfig($plugincfg);		
	}
}