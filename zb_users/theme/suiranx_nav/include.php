<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */   	    		     						       	  	   
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/submit.php';            		 		    		 					
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'view.php';    	   	 		     	 		 	 
#注册插件     	   			      	 	 	                  				 		    	 			 		     		   	     		    	 
RegisterPlugin("suiranx_nav","ActivePlugin_suiranx_nav");         				 	  
function ActivePlugin_suiranx_nav() {         		  				
    global $zbp,$s;     	  		 		     	 	 		      	 	 			     	 			 	    	 	  		      		           			 	 
    Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'suiranx_nav_AddMenu');         			  	    	 						       	  		      			       	 	   		       	 	 	      	 		  
	Add_Filter_Plugin('Filter_Plugin_Zbp_BuildModule','suiranx_nav_aside_rebuild');//重新加载侧边栏        		  	 		    				 	      	   		         	        		   	 	     							     	     	
	Add_Filter_Plugin('Filter_Plugin_Html_Js_Add', 'suiranx_nav_Html_Js_Add');      	 		        					 		    	 	    	   	  	 	      	     		    			 		 	     		 	       								     	 	   	    	  	 	 	
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','suiranx_nav_from_where');//网址         	    		
	    	 		  		
	//Add_Filter_Plugin('Filter_Plugin_Edit_Response5','suiranx_nav_index_top');//首页分类里设为置顶     				 			
    	   				    	 	 	  	    	    	 	    	  					
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','suiranx_nav_coverimg');  	          		    	 	  	      	 	   		    				 	  
	    			  			     	 				     	  					        		 	     					           			     		  			
	Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','suiranx_nav_submit'); //申请提交      				 	     		 	 		        			       		  	 	     	    	       		 		       		 	  
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response', 'suiranx_nav_Category_Edit_Response');        	 		 	      	   		 
	      	 	        			 		 
	Add_Filter_Plugin('Filter_Plugin_views','suiranx_nav_views');        		  	      	 	 	 
	    	 				 	      	 			 
    Add_Filter_Plugin('Filter_Plugin_PostArticle_Succeed','suiranx_nav_SaveIco'); //保存远程图标和图片	       			      		 		 		     						     	  					    			  		     		    		      	 			 
	if($zbp->Config('suiranx_nav')->seo_switch == '1'){       	        	  					    	  		 	     		 	 	 	    			   	     		  			      	 	  		     					 	    		  			 
    	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','suiranx_nav_art_seo');    			    	      	  	 	    		 	 			     	 	 		     				        		 			      			 			       			 		     		 			 
    	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','suiranx_nav_tag_seo');       				      			         				 	       		 		     	 	 	 	       	 				        	         		 			     	 				 
    	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','suiranx_nav_cat_seo'); 			 	 		     		  		      	  	        	          	 	 	 		    		     	     		  			    	    	         					
	} 	    		  		          	       				         		  		 
	if($zbp->Config('suiranx_nav')->HasKey("diy_css")){      		          			   		    	    		     	 	 				    			 	 		
	    $s .= $zbp->Config('suiranx_nav')->diy_css;    	 						    			         	  			 	    	 	 				    					 		
	}	    		 			 	    			   	      	  	 	     		 		  	       	    
	$zbp->header .= '<style type="text/css">'.$s.'</style>' . "\r\n";     	   	  	    		 		 		
	    			 			     	    		 
	AutoloadClass('suiranx_nav_views');     		  		 	     		 	 	 
	    		 		 	        					
}     		  	  	    		   	  
     		 	        	 			   
//验证url，必须输入http/https       				 	
function suiranx_nav_domain($domain) {     	 	 	  
    if (preg_match("/^(http:\/\/|https:\/\/).*$/i", $domain)) {      	     
    return true;      	  	  
    } else {    	   	  	
    return false;    	  	  	 
    }    		 		  	
}      		  	 
//保存远程图标和图片    		    		
function suiranx_nav_SaveIco(&$article) {                    		   	  
  global $zbp;                 	 					
  set_time_limit(0);                   		  	 	 
  ZBlogException::ClearErrorHook();                    	 		 	 
  $aurl = $article->Metas->coverimg;                  	   			
  if ($aurl){                          	   		 	
      if(substr($aurl,0,strlen($zbp->host))!=$zbp->host) {                   			 	 
        $path=$zbp->usersdir.'upload/'.date('Y').'/'.date('m');                           		 	 		
        if(!file_exists($path)) mkdir($path,0755,true);                    	 				  
        $picname=date('YmdHis').'_'.rand(10000,99999).'.'.pathinfo($aurl,PATHINFO_EXTENSION);                   	 	 				
        $pic=$path.'/'.$picname;                   		  		 	
        $getpic=suiranx_nav_Save($aurl,$pic,$picname);                         	 
        $picUrl=str_replace($zbp->path,$zbp->host,$pic);                   	      
        $article->Metas->coverimg=str_replace($aurl,$picUrl,$article->Metas->coverimg);                  	 			  
    }                 		      
  }                      	 	  		 
  $article->Save();                      		  	 	
}         	   			 
function suiranx_nav_Save($url,$filename="",$name) {                	   		  
  global $zbp;                    			 	 		
  if($url=="") return false;                        	 		  
                     	 		   
  if($filename=="") {                        	 		 		
    $ext=strrchr($url,".");                      			  
    if($ext!=".gif" && $ext!=".jpg" && $ext!=".png" && $ext!=".ico" && $ext!=".jpeg") return false;                   			 	   
    $filename=date("YmdHis").$ext;                   	  	 	 
  }                   		 	  	 
                     	 	 		 	
  $img = GetHttpContent($url);                      		 			  
  $size = strlen($img);                  						
                  	 		    
  $fp2=@fopen($filename, "a");                 			 	  
  fwrite($fp2,$img);                    	 		 			
  fclose($fp2);                    	 		 		
                      			 		
  $upload = new Upload;                 	 	 	 		
  $upload->Name = $name;                  	 					
  $upload->SourceName = $name;                	   	   
  $upload->MimeType = "";                    		 	   	
  $upload->Size = $size;                    	   				
  $upload->AuthorID = $zbp->user->ID;                     			   	 
                      					   
  foreach ($GLOBALS['hooks']['Filter_Plugin_Upload_SaveFile'] as $fpname => &$fpsignal) {                 			  		 
        $fpreturn = $fpname($filename, $upload);                    	 	 	 		
        if ($fpsignal == PLUGIN_EXITSIGNAL_RETURN) {                   	 					 
            $fpsignal = PLUGIN_EXITSIGNAL_NONE;                      	 	  
            return $fpreturn;                   		   	 
        }                   			  		 
    }                   			   	 
                     		  	 
  $upload->Save();                   		   		
                        	 	 
  return true;                     	   	 		
}       	 	 		     			 		  
//插入js变量        	 	     		  	  	       		 		        	  		       			 	       	     	       	  	 
function suiranx_nav_Html_Js_Add(){     	 		             	        	 	      			 	        						       				 	    	  				     	   		 	       		             		
	global $zbp;      	 	 		      		 		 	     		  		       		 	  	       	 		     		  	 		     		 		 	    		           	 		 		    	    	 	
}      	     	     	 	          	   	      								     	   	 	     			 		       			  	
//后台按钮        			     				 	 	    	 		   	    	  	  	     	  					    		 	   	    	   		      	 				      			 	 	 
function suiranx_nav_AddMenu(&$m){     		 	  	        	 	     	 	   		    			  		      	 				     	  				        			       		 	  	       			  
	global $zbp;    		    			              	       		  	          		 	    				   	     	   	      	 				  
	array_unshift($m, MakeTopMenu("root",'随然Nav主题配置',$zbp->host . "zb_users/theme/suiranx_nav/main.php?act=base_set","","topmenu_suiranx_nav"));    	 	 	  	      		 			    	  				       	 	 	     		 	   	    	   		 	      	  			     			         		 	   
}  		 		 	     		  	  	    			   	     			    	    	  	 	 	           	       	 		     	  		  	
function suiranx_nav_SubMenu($id){     	          			 	       		  		      	   		 	       		  	    	  	 		        	 	 	    		    	     	  	    
	$arySubMenu = array(      				    	   		 	    		 	 	        			 		    	  			 	    	 	  		      	 		  	    					  	
		0 => array('基础设置', 'base_set', 'left', false),        		  		 	    	   	  	      				 	      	  	  
		      	  	       			        	 	 	        		  	  
		1 => array('申请收录', 'submit_set', 'left', false),		     	 		 		    		   		      	 	   	     	 			  
		     	 		          	 	 	        		      	 	     
		2 => array('导航设置', 'nav_set', 'left', false),         				    	  				        		 	     	 		 			
		    		  	        	 			 	    	  				     		    	 
		3 => array('列表页类型', 'list_set', 'left', false),      			          	 		      			  	     				 	 	
		     						     			    	    					  	    	 	 	   
		4 => array('SEO设置', 'seo_set', 'left', false),        		 	 	       	  	       	 	  	        			 		
		     		 	         			 	     			 		      	 		  	 
		5 => array('熊动画/搜索/幻灯片', 'slider_set', 'left', false), 		    		          		 	   	    						      			 	 	 
		      					     		   	 	    	 						    		   	  
		6 => array('广告位设置', 'ad_set', 'left', false),       		   	 
		    	  		   
		8 => array('其他功能', 'other', 'left', false),      		  		  
		    				  	         				          	     	   		  
		7 => array('自定义css', 'my_css', 'left', false)      	  		     		 		  	    	  	  	     	 		 			
	);    	 	      	 		 	    		 					    		 	 	 	    				 	 	     	 	   	    					       			 		 	
	foreach($arySubMenu as $k => $v){     		 		      						 	    	   		 	      	           	           					      			   	    		 	          	 				
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';    	 					      	  			           		    	 	 	  	    	 	 			        		 	     	 	 	        		  	 	      		    
	}      	  	 	    				 	 	     	  	 		      			       	 			 	     		    	      	     	    	 	 			 
}        			 			         	 		      		 		      	  	 	 
//分类Meta字段        	  	        	 	     	 				      	    	 	
function suiranx_nav_Category_Edit_Response() {    			  		      							       				     	  				 
    global $zbp,$cate;
	echo '
	<p>
		<span class="title">首页[导航][文章]样式选择:</span>
		<br>
		<select class="edit" size="1" name="meta_indexstyle" id="meta_indexstyle">
			<option value="0"'.($cate->Metas->indexstyle?'':' selected="selected"').'>导航样式(默认)</option>
			<option value="1"'.($cate->Metas->indexstyle==1?' selected="selected"':'').'>文章样式</option>
		</select>
	</p>';
}     		 		      	 			 		     		   		     			 			
//文章seo    	   	 	      							    	 		 		     		 			 	     		 			     	    		     	 	  	          		        	          	      
function suiranx_nav_art_seo(){     							    	  		  	    			 	 		    		 	        			  		      		 	 	      	   			     		  	        	  			       		        	 	    
	global $zbp,$article;     	  				    		     	    	 		 	 	    	 	 	  	    	 	    	      	 		         	 			    	 		        	    			    					 	     		 	  		
	echo '<div class="editmod"><label for="meta_arttitle" class="editinputname">SEO标题：</label><input type="text" name="meta_arttitle" style="margin: 5px 3px 0 3px; padding: 3px; line-height: 1.8em; height: 1.8em; font-size: 1.2em; width: 99%; color: #333;" placeholder="留空则调用文章标题" value="'.htmlspecialchars($article->Metas->arttitle).'"/></div>';    			 	  	    						 	    			  	 	      				      		 	 			    	    	 	    	 	 		      	   			     	    	      	  		 	        	 			
	echo '<div class="editmod"><label for="meta_artkeywords" class="editinputname">SEO关键词：</label><input type="text" name="meta_artkeywords" id="meta_artkeywords" style="margin: 5px 3px 0 3px; padding: 3px; line-height: 1.8em; height: 1.8em; font-size: 1.2em; width: 99%; color: #333;" placeholder="留空则调用文章标签" value="'.htmlspecialchars($article->Metas->artkeywords).'"/></div>';    		 		  	    		 	 			    	 	 				         	 	    		 					    		  			     			 	 	       				 	    	  	  		    	    	 	    	   		 	
	echo '<div class="editmod"><label for="meta_artdescription" class="editinputname">SEO描述：</label><textarea name="meta_artdescription" style="margin: 5px 3px 0 3px; padding: 3px; line-height: 1.8em; height: 5em; font-size: 1.2em; width: 99%; color: #333;" placeholder="留空则调用文章摘要">'.htmlspecialchars($article->Metas->artdescription).'</textarea></div>';     		         	 	  	      	  					    	 	          		  		       	 	 	      	 				      	 	         	     	
}      				       		 	 	       			 		     	  		 	    				 	 	     		 	 	      	  		       	 		 	      	 	   	    	  	   	
//分类seo    	 						    			    	      				      	   	 		    		   			    				 		     			  		       						     	 		       			 		  
function suiranx_nav_cat_seo(){     	   	         				      	   	      			   		    		    		     	 				     	 					     	 		         	 	        	 			 	 
	global $zbp,$cate;     	   			      	         	 			 		    	    		       		  		    		           				  	     			 	       	 	  	     			 	 		
	echo '<p><span class="title">SEO标题：<span style="color:#999;">(主题自带的seo功能)</span></span><br /><input name="meta_catetitle" type="text" id="meta_catetitle" style="width:60%;" value="'.htmlspecialchars($cate->Metas->catetitle).'"/> </p>';     		 		 	      	   	           		     		 	  	     		  			    		 	 			       	 		       		 	 	     				          			 	          	 
	echo "\n";		     		         	  	 			    	  			 	    			 	 		    			  	      		  			     	 				 	      		 	 	        	       			         	       
	echo '<p><span class="title">SEO关键词：<span style="color:#999;">(主题自带的seo功能)</span></span><br /><input name="meta_catekeywords" type="text" id="meta_catekeywords" style="width:60%;" value="'.htmlspecialchars($cate->Metas->catekeywords).'"/> </p>';       				     			  	       	 	   	      		  	          		           	          		     	 	  		           		      	   		    		 	   	
	echo "\n";     	  		 	      	   	     			  	 	    	 				        		 		       		   	    				 			    		 	        	 				 	         	      	  	  		
	echo '<p><span class="title">SEO描述：<span style="color:#999;">(主题自带的seo功能)</span></span><br/><textarea name="meta_catedescription" id="meta_catedescription" cols="3" rows="6" style="width:600px;">'.htmlspecialchars($cate->Metas->catedescription).'</textarea></p>';      		 	  	       		 		       	 		 	       	   	    		  	 	      					        	 		       			  		     	     	    	 		 	 	
}    		 			 	       	        		     	    		 	  	       	  			    	 	 		 	    			 	 		     	 	 	       		 		      	 	 	 	 
//标签seo    					        				  	          	     	 	 	       	  				     		 	         		    	    		   			     	    	     	       
function suiranx_nav_tag_seo(){      	 	        	    	     		 	   	    					 	     	 		 			         			     			 			    						 	      	 	  	    	  	   	
	global $zbp,$tag;      						      	  	 	    	 	 	       		          			 	  	                 		 			     		 			 	        		 	     	  	 	 
	echo '<p><span class="title">SEO标题：<span style="color:#999;">(主题自带的seo功能)</span></span><br /><input name="meta_tagtitle" type="text" id="meta_tagtitle" style="width:60%;" value="'.htmlspecialchars($tag->Metas->tagtitle).'"/> </p>';       		 	      		 	 	     	  			 	     	 		  	    	 	 	 	      	 		 		       		 		    		  	 		     	  		 	     	  	  	     		  			
	echo "\n";	    	     		    		     	     	 				     		 	 		     		  		      	 					      	 	  	     	  		 		    	  	 	      		    		    	 		 		 
	echo '<p><span class="title">SEO关键词：<span style="color:#999;">(主题自带的seo功能)</span></span><br /><input name="meta_tagkeywords" type="text" id="meta_tagkeywords" style="width:60%;" value="'.htmlspecialchars($tag->Metas->tagkeywords).'"/> </p>';    		 		 	     	  		  	    	           	   	       		 	        		 		           		 	    	  		  	    	 	 		       		 		      	  					
	echo "\n";    	 		 			    	 		  		     				 		     	  				     		 	 	     			 	 	     	    	 	      	 	 	      					 	    		   	 	     	 	 	 	
	echo '<p><span class="title">SEO描述：<span style="color:#999;">(主题自带的seo功能)</span></span><br/><textarea name="meta_tagdescription" id="meta_tagdescription" cols="3" rows="6" style="width:600px;">'.htmlspecialchars($tag->Metas->tagdescription).'</textarea></p>';       				       		 	 		     	 		   	     	 			 	    		   	      	   			     		   	      		 		 	     			 	  	    		 	  	 
}         			 				    			   	     	 	  	       		   	         	 	     	 			 	     			  			
//上传图片时替换        			     	 						    		  	  	      				      			 	 		    	 	 	             		    	 	 				         	       	 		  	    	    	 	
function suiranx_nav_Get_Logo($name='logo',$type='png'){    	     		          		    					  	      	 		 	      				             	     	 	        		 		 		      	  		     	   	 		    	 			 	 
	global $host;    	  		 	     	  	           	  		    			 	 		    	  	  	     		    	     	 		 		     		 	 	      	           		  	 		    	  					
    $path = $host . 'zb_users/theme/suiranx_nav/image/'.$name.'.'.$type;     			 			    			  	        	 	  	    	 	 	  	      			       	 	 		 	    		 	 			     			 		     		  				    					  	      			   
    if (file_exists($path)){        			      				  	    	 	 	 		    	  			 	         			     				  	    		 			 	    	   	  	    			 	  	      		   	     		  	 	
        echo $name.'.'.$type;    			  	        	 			     				  	      	 					    	 		 			       		 	       		  		     	 	   	    	 	 	 	     		  	  	    				 			
    }else{      	 			       	 	  	    	 	 			       	 				    		 	   	    	 	  			    	 		  		     	 	  	     								    				 			       					
        echo $name.'_default.'.$type;     				 		         	      						      	  		 	      		 			     		     	    	    	 	    		 	        						 	    		 		 		      	 	   
    }    		  	         	   		    	 			  	      					     				 	      	 	 	 	     			         	 	         	  		 	      	 	  	       		    
}     	 			 	     	     	     		 			         	  	     	   	 	    	   	 		    		     	
//      	 	 		       	 	      	  	 	      	 			 		     	  		 	      	 		      				  		
//多久之前的时间格式         	 	 	       		     	    			    	     		  	 	     		 		 	    	     		     	   			
function suiranx_nav_timeago($ptime) {        	  				    					 		      	  	       					      	 	   		        		      	  				 
    $ptime = strtotime($ptime);   	      	  	  	       		  		    	  	 		       			 	     	 		        	  	          	 		      			  	  
    $etime = time() - $ptime;    			 			    	    		        			 	    	 			       	    		     		 		 	     	 				       		    	
    if ($etime < 1) return '刚刚';     	  			        			  	    			 	  	     	 		  	     		          		  	          	   
    $interval = array(    	     	 		 			    				 			    	  	         	 				     	    	 	      					     								
        12 * 30 * 24 * 60 * 60 => '年前',  			        				  	      	  	  	     		   	        		       	    	 	     	 		       	    	 	
        30 * 24 * 60 * 60 => '个月前', 	        		 		     	           					 	    					       	    	       			  		         		 
        7 * 24 * 60 * 60 => '周前',  		       	        	 	  	      	  			      		   			      				 	      		        		 	 		     	 			  	
        24 * 60 * 60 => '天前',         	  			    	 	  			    	   		      	 				      	 		 	      	  	 			       			 	
        60 * 60 => '小时前',       	 	    	       			      	  			 	     			 	        		  		     			 		     			 				    			  	  
        60 => '分钟前',  			    					 		     			         	 	 	 	    		     	    	   			     	   	          				 
        1 => '秒前' 		 		    	 	 			      	  	        	           	  		 	      			 	      				       	   				
    );    		    	 			 		    		            			 	       	  	 	      			  	    	  	 			    		     	
    foreach ($interval as $secs => $str) {       		   	      	 		       				 			    				 	 	                	 	  		     					 	      				 		
        $d = $etime / $secs;      			 			        	 	     				 			    		 		 	     	  	 	          	 	     		   	 	
        if ($d >= 1) {     				 		      			 	 	       			      		 		 	     	 		  	      	 	 	      			    	      						
            $r = round($d);  	          	           		      			 	          				       	  			      	  		     	 	            			  
            return $r . $str;  	     		 			     			 	        	  	 		     		  	       	  	       		     	     	   	      	 	 				
        }    			   	      	   		        			 	        	  	    		 					    	 		  		     		  	      		     	
    };     	  		 			    		 			 	    	 	 	 		       				         			     	 	 	       	 		 		     		 				 
}          	  	    				   	     	    		         	 	
//首页分类里设为置顶     				       			  	 	    			 	 		
function suiranx_nav_index_top(){     				 	     	 	 		      	 	  		 
    global $zbp,$article;    			   	 
    if($article->Type=="0"){ 
 echo '<div id="alias" class="editmod">
       <span class="title">在首页分类里设为置顶: 
	   <input name="meta_suiranx_nav_index_top" type="text" value="'.$article->Metas->suiranx_nav_index_top.'" class="checkbox" style="display:block;" />
	   <font color="#FF0000">(选中这里，在首页分类里设为置顶)</font></span>
       </div>';
    }      			 	  	
}      	       				 
//分类置顶    	    	      	  	  	 
function suiranx_nav_cate_top($Rows,$CategoryID,$hassubcate){    	 			 		    					 		
        global $zbp;    	  	  		     		  	  
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);    	  	 	      		 		   
    $wherearray=array();     		 					     		 		 	
    foreach ($ids as $cateid){    		 			 	    		  		 	
      if (!$hassubcate) {     	 	 			     		  	  
        $wherearray[]=array('log_CateID',$cateid);       	  	       	 					
      }else{       				     			 	   
                $wherearray[] = array('log_CateID', $cateid);     	 	 			    	 				  
                foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {    	  	 	      			 			 
                    $wherearray[] = array('log_CateID', $subcate->ID);    	  			      			 			 
                }     	 				     				 	  
      }    	 						        		  
    }    	 		          	 		 	
    $where=array(     		  	 	      				  	
                    array('array',$wherearray),     	 	 	       		   		 
                    array('=','log_IsTop','4'),     		 	 			    	    			
                    );     	 	 	 		    				 	  
     		 					    		  		  
    $order = array('log_ViewNums'=>'DESC');     			         				 	 	
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');         			 				       	 			
     	 		   	    		  	 	 
        return $articles;      	 	 	       	 		 	
}         		  
//列表页按评时间正序排序(默认文章输出是倒序)    		  	 		     	  	 		    	 		   	    	  		  	
//function suiranx_nav_list_by_time_asc($cateid){    		    		        				    				 	      	      	    		 		   
//    global $zbp;       		 	      			 	 	    		   		 
          		 	      	  		  	     					  
//    $where = array(array('=','log_Type','0'));     	  	 	     	    	      			  	  
//    if ($cateid) {        		 	      	  			     		     
//        $arysubcate = array();    				 			    	 	   		    		  	   
//        $arysubcate[] = array('log_CateID', $cateid);    				 		        	  		    	 	  	 	
//        foreach ($zbp->categories[$cateid]->ChildrenCategories as $subcate) {     	  		      			 	  	     	 	   	
//            $arysubcate[] = array('log_CateID', $subcate->ID);     		 		 	     	  	 	       	  	  
//        }     		 	  	     		  			    	    		 
//        $where[] = array('array', $arysubcate);       	 			     	 	 	       			 		 
//    }         			      				 	      		  	 
//    $where[] = array('=','log_Status',0);       		         	 	    	     	 	   	
//    $order = array('log_PostTime'=>'ASC');          		   	      	 	       	 			 		
        	  			         		  	     	 	   	
//	$articles = $zbp->GetArticleList('*',$where,$order);                 	 	     		 				    			  	 	           	      					 
     		   	       	 			       		  	          		 	      	     
//    return $articles;    			   	     	 		 			    			 	  	     	  	  	    	  		 	 
//}     	   			      		 			     							    				 			
//按评时间正序排序(默认文章输出是倒序)    			          						     	 				 	       					
function suiranx_nav_sort_by_time_asc($Rows,$CategoryID,$hassubcate){    		    		    	  		 	        				       	   	     					 		
    global $zbp;    		     	    		 	 	      	 				 	         			    		  		  
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);    	     	                 	 			        						     		    		
    $wherearray=array();     	  	         	 	 	 	    	   		      					  	      		 		 
    foreach ($ids as $cateid){    	   		      	 			 		    	  					    		  	 	     	 		 		 
      if (!$hassubcate) {     	            				      	 	 	  	    				        					 	 
        $wherearray[]=array('log_CateID',$cateid);     				 		     			 		      							     	   		      		   	  
      }else{     			 	      	  	 	 	        	 	     			 	       		 	   	
                $wherearray[] = array('log_CateID', $cateid);     	  	       			  		      	 		        	 	 		         	 	 
                foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {    				 	       			  	     	  				      	 					    			     
                    $wherearray[] = array('log_CateID', $subcate->ID);    		 	  		    	 		 			     	 		  	       	 	 	     	 		 		
                }    	 	 	 	     	 	 	  	    	 	  	 	     	  		 	    	  			 	
      }      	 	  	    		   	 	      	   		    			 	 	     		    	 
    }    			 				        				      					     	 	 				     	 	  	 
    $where=array(       	 		        		 		      		  	 	    	   	 	     	 		 	 	
                    array('array',$wherearray),       	         	   	  	    	  	  		      			 		    	  	 	 	
                    array('=','log_Status','0'),     			   		    	 	  			    	   		        	 			     		 		  	
                    );        	           			 	     					 	    	 		        				  	 
      					 	      		  	     	 			  	    	  	 			    			  			
    $order = array('log_PostTime'=>'ASC');     	 		  	       		 		        					    	 	 	  	    	 			  	
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');              	 	    	 		 		       	   		      	   	     	  		   
     		   	      				 	 	     			  	      	   	 	    	   		 	
        return $articles;    			   	     			 	 	      	 	 		       		  	      	  	 	 
}      	         		   	        					     		     	
    		 	 	 	      	                	     	 		  	
    	 	 		 	    	 	 	 		     			  	     	 	   		
       		 	       		   	     	  	  	    			  		 
//列表页按评浏览数排序     	  	         		 	      	     		    	  		 		
function suiranx_nav_list_by_view($cateid){        			 		     					 	      		  		
    global $zbp;     	  	  	     	   			      	 	  	
           				      				 	     	 		 	  
    $where = array(array('=','log_Type','0'));       	  		    		 	 	 	    	 		    
    if ($cateid) {      	  	 	      		   	    				 	 	
        $arysubcate = array();    				 	 	     							    		  		 	
        $arysubcate[] = array('log_CateID', $cateid);    	  	  		      		 	 	    					 	 
        foreach ($zbp->categories[$cateid]->ChildrenCategories as $subcate) {     	 	  	      					        		 		 
            $arysubcate[] = array('log_CateID', $subcate->ID);      		 			    		  	  	      	  	  
        }     			   	    	  			        			 		
        $where[] = array('array', $arysubcate);    			   		     			  		     		 		 	
    }     	  	  	     	  	 	     		 					
    $where[] = array('=','log_Status',0);      		     	    	 		  	      	 	 	 	
    $order = array('log_ViewNums'=>'DESC');        		 		          	 	 	     	  	 		
         	  	       		 		 	     		 			  
	$articles = $zbp->GetArticleList('*',$where,$order);                 	 	     		 				    	  	  	       			 		    			  			
     		   	       	 			      				   	    		 				         	  	
    return $articles;    			   	     	   	  	      		 	        				 	    	 			 	 
}     	 				          				    		   	        	 			 
      			  	    	 		        			   		    				  		
    	  	 		       		 	 	      	 			     	  		  	
    	  		 		    		    		        				     	 					
//按评浏览数排序      	  			     	          			 		 	      	 	 		
function suiranx_nav_sort_by_view($Rows,$CategoryID,$hassubcate){    		    		    	  		 		     						       	 			     			 		 	
    global $zbp;    		     	       	  	     		  				    	  	        	 	 		  
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);    	     	     		  				        	 		    	 	  		     			 		  
    $wherearray=array();     	  	        		 	 	      		 	 		       			 		    		 	 	  
    foreach ($ids as $cateid){    	   		      					 		    	 	  	      			 	       		  	   
      if (!$hassubcate) {     	          	    	 	    	 	 	 		    	   	 		    	   		  
        $wherearray[]=array('log_CateID',$cateid);     				 		     	 				 	     	  				    					  	    				   	
      }else{     			 	       			  	     	   			     		   			       	 	 	
                $wherearray[] = array('log_CateID', $cateid);     	  	       	   			           		    			  	      			 				
                foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {    				 	      	 		 		     	  	 		     			  	      		      
                    $wherearray[] = array('log_CateID', $subcate->ID);    		 	  		    	   				    	   	 		    					 	     				 	 	
                }    	 	 	 	      	    	       	           	 		       	    	 
      }      	 	  	    	           			    	       	   	    			  	  
    }    			 				     	 				     	     		    		  			      			 			
    $where=array(       	 		      	 	 		 	     	 	 			    		 					        		 	
                    array('array',$wherearray),       	          					 	       	 	      			 			     	   				
                    array('=','log_Status','0'),     			   		    	 		   	    			 		       	 		 		    		  				
                    );        	        	  	  		     		  			    	   		        	 		  
      					 	    	    	 	     		    	    	  		 		    				   	
    $order = array('log_ViewNums'=>'DESC');     	 		  	     		   	 	      	 			     			  		      					 	
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');              	 	     			 	 	      			 	        	  	        	  		
     		   	       			  	     	 	 	 	      	  	 		           	
        return $articles;    			   	       	 	 	     					 		      			 		      	 	 		
}        	 	 	 		    	  	  		    	 	         	       
//列表按评论数排序    	  	  	     		 		 	      		 		      	  		 	 
function suiranx_nav_list_by_comment($cateid){          	  			      						    		      
    global $zbp;    					 		    		 					    	  			  
          	    	    			   	       	 		  
    $where = array(array('=','log_Type','0'));    			    	      	    	    		 	   	
    if ($cateid) {     	   			      				 	       	 			
        $arysubcate = array();    				   	    	    	 	     		 				
        $arysubcate[] = array('log_CateID', $cateid);       	  		     		 		       				  	
        foreach ($zbp->categories[$cateid]->ChildrenCategories as $subcate) {       				     	  	 		     						  
            $arysubcate[] = array('log_CateID', $subcate->ID);    			 	  	     	  		      			   		
        }       		  	    		 	 	 	     	 			  
        $where[] = array('array', $arysubcate);      			 	     			         		 	 			
    }    				 	 	    	 	  	 	    	 					 
    $where[] = array('=','log_Status',0);       					         	  	     		     	
    $order = array('log_CommNums'=>'DESC');        				  	      	 		  	    	 	 		 	
        		          		   			           	
	$articles = $zbp->GetArticleList('*',$where,$order);                 	 	     		 				    		 	 	       						     	       
     		   	       	 			      			  		     	 	 	  	     				 		
    return $articles;     	 			            		     	 		 			
}            						     		 			       	   	     	 	  	 	
//按评论数排序    			  	      	  		  	    	  					     	  		 	
function suiranx_nav_sort_by_comment($Rows,$CategoryID,$hassubcate){    			 		 	     	 		 	        			         	   	      	  		 
    global $zbp;    		 					    	   	 		    			 			      	   		        			 	
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);      		   	    	  					        				        	 		      	   		
    $wherearray=array();       			 	     	      	    		  	 	     		   		      	 	   	
    foreach ($ids as $cateid){    	 						    			  	 	    	 	  			     	 		 	       			   
      if (!$hassubcate) {    			  			    	    		     	 		 	 	    			  	       	 		  	
        $wherearray[]=array('log_CateID',$cateid);     		 	   	     			 			     	    	     	  			      		 	 		 
      }else{    			 	 	     	 	 	  	    			  	 	    			         		 		   
                $wherearray[] = array('log_CateID', $cateid);    	    	       	  			         		      		  				    		 	 		 
                foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {    	 					     			  	         	 		     	 	 		 	        	 	 
                    $wherearray[] = array('log_CateID', $subcate->ID);     		    	     	  	 	          		      	  	  	    			 		  
                }        		 	    	  			      	  			        	  	         				 
      }    	    			    			 		 	     	 	 	      	    	      	 						
    }     		 		      		 		 		        	 		     	 			 	    		  		  
    $where=array(     		  		 	    	  		       	 		   	     	   	 	    	  	 	  
                    array('array',$wherearray),     		   	 	                	 		 	        	  	         			 	
                    array('=','log_Status','0'),        		        		 		 	    	 		         		         			   	 
                    );     		 	        					 		    				 			     	   	 	         		 
     		   	 	     	   		       						    	   	 		     	  		 	
    $order = array('log_CommNums'=>'DESC');     		 				     	  					        			      	  				       					
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');           					     			  	      		 	 		      	 	  		    			 	  	
     	 				         	 			    	   			      	 		  	     				 	 
        return $articles;         	 	    		   			     	  		                    		    
}        	 		   
//一天发布的文章量     	 	  		
function suiranx_nav_postNum(){     	    		
	global $zbp;    	   				
	$gettime = strtotime(date("Y-m-d"));//当天时间     			    
	$db = $zbp->db->sql->get();      	   		
	$sql = $db->select('zbp_post')->where(array(array('=','log_Status','0'),array('>','log_PostTime',$gettime)))->sql;	    	  	  		
	$array = $zbp->GetListType('Post', $sql);    	 					 
	echo count($array);	    			    	
}     		 	 		
     				   
    	  			 	
      		  	 
//待审核文章量    	  					
function suiranx_nav_passNum(){      	 		 	
    	  	 			
}    	  	 	 	
//手机端判断	        	  	    	 	 		 	       	  		    	  		  	     	 	 			    	    		     	 		  		
function suiranx_nav_is_mobile() {       	 	      	  	  	     		 	  		     			   	     			           				     			 	        	          	 	 	  	
	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {    	 	  	        				 	    		  	  	      		  		     	   		         		       	  	 		    	  			      	  	 	  
		$is_mobile = false;       	  		    	  	  		    			 		 	    	  	  	        	 	        	  		       				 	       		  	    	  		 		
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)       				  		    	  			        		  	     	     		    		 				     				 	        			   
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false		     		 			        	  		    	  		  	       	  	       	 	         			 		    			  	       	   		      	 	 		 
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false    		 					      				      			 	 		      	 	       			 		       	 	 	 	    			  	 	    	 	    	    	  			 	
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false     				 	      	 	 	 	      	 	 	      				 		    	 			 	       	  	 	    			 		      					       	 				  
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false     		 	 	     							     	  	   	     							    	   		 	    		 	   	      	  	           			       	 		 
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false       			  	    	 		  		          		    	  	 			    	 				      	 		   	    			  		     		  		 	    				 	  
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {     		 			       	 		 	    			    	          		    	  			      			   	      				 		     	 	   	    		  				
			$is_mobile = true;    		 		        	 		 	      			  		     	 	  		    			 		 	    	    			      		 		       				         	 	  
	} else {     		 			      	 	 	 	        	 		    	    			     		 			        		 		       	  	     		 					
		$is_mobile = false;  	      	 				    	  	 	      	  	  		     	 				       			       		 		 		      	  			     			  	 
	}    			  		     	     		      	  		     		 	 		          	         	  		    	 			 	          			
	return $is_mobile;      	  	 	      		 	 	     	    		     			  		    		   	       	 	  		    				 		      	 		 		
}       		 	 	          			      	  			     	   	 	       				 	    	  	 	       	  			 
//网站【副标题+网址】     	   	 	    			 	 	      		 	 	            	      		 			       			 	    	 	  	  
function suiranx_nav_from_name($id) {      		 		     	  		  	    	 			 	       	 			      	  		 	      			 		    		 			  
	global $zbp,$article;    	 	 		         	        	 	    	      	         			  			      	   		     	 	 			
	$article=GetPost((int)$id);    		 				     				        			  	       	 		 		      				 	    			 	 	     				   	
	$article_from_name=$article->Metas->suiranx_nav_art_name;       			      						       	 		        	 			 	       	  		     	 			      				  	 
	if(empty($article_from_name)){     			 		       				 	    	 	 	  	    		   			    		  				    		    		    	     		
		$article_from_name = "您尚未填写站点副标题";    				   	    				 		     			 	 		         		       		  	     	   				      						
    }      			  	     			   	      					     	  	   	    	 		  		     			 	 	            
	echo $article_from_name;     	   	      	  	 	 	    	  	 	      	 		 			    		   		      	 	 			        				
}    	  		  	     	  	        	 	        	 	   	     	   	 	      			  		    			 	 	 
function suiranx_nav_from_url($id) {    	 	 	       		  	  	     		 		      	            		 				     	  	       			  			
	global $zbp,$article;        	  	    					       			 	  	    	 	 		 	    		 	 			    		   	 	     				   
	$article=GetPost((int)$id);      	   		      	 		 	    	 						     	 					      	    	     		   		    	 			 		
	$article_from_url=$article->Metas->suiranx_nav_art_url;    	  	 	 	    	 					     				 			       		 		      						    				 		     				 	  
	if(empty($article_from_url)){    		 		        				  	      			 		     		 				     			 			    	 	  			      	 				
		$article_from_url = "";       	  	       	 	 	      	    		    	   	       	            		  			    		   		 
    }    	  	 	       			   	     	   		     		 			 	    				 	 	    	 	  		          	  
	echo $article_from_url;    				   	    		    		    	  	 			    			 	 	     			          	 			      	     	 
}    	    	       	   	      				  		      	  			     			 			     			 		       	 	  	
//return返回值【2019-07-10】    	   	  	    		 			 	    	 		   	     			          				 	         			    	      	
function suiranx_nav_from_url2($id) {     				  	    	   				    				 			    	  			      		  		 	     		 	  	     			 	 	
	global $zbp,$article;    			    	      	 	             	      	 	  		    	   	 		     	 	 		        	 	 	
	$article=GetPost((int)$id);    		 					       	 			      		 			    	  		 		    			 	        		 			     	 		  	 
	$article_from_url=$article->Metas->suiranx_nav_art_url;    		 				        	 			    		 		  	    	  		 		     		 			      	    		     	 		  	
	if(empty($article_from_url)){     			   	       			 	      	  		      	 			      	      	    	   	  	     	 	   	
		$article_from_url = "";    	 		 			    		 	 			    	 	  	      	  				      	 			        	  	      		  	 	 
    }    		  	  	    	   	 		     				 	     		 		 		       	  		        	 		    	    	 	
	return $article_from_url;    	 	  			     		  			     		   		     		   		    	 		   	    		  	  	      						
}    	 	    	     		 				    		 	        	     		    	 	  	 	    	   	        		  	 	
//匹配网址去掉http(s)【爱站网不支持网址带http(s)查看数据】【2019-07-10】    	 	   		    			 	 	      	  		       	 	 	 	    		    		     	  	            	  
function suiranx_nav_url_delete_http() {    	 	 		      		  		        			       	 	 				       		  	    						 	      	  	 	
	global $zbp,$article;        	 	 	       		 					    	  		  	     	  		      		 	 	        	 	 		     	    		
    $url = suiranx_nav_from_url2($article->ID);    	 			 		    	 	 	 		       	 			     	 	   	      		 	      	 						      	  		 
    echo preg_replace("/(http:\/\/)|(https:\/\/)/i","",$url);        		 	 	       	   	      	    	 	    	     		    	 	 	 	       						    	 	 	   
}        				     	 	 		     			  	        	 	 	     	  		 	      	 					    	  	 		 
function suiranx_nav_from_where(){    	     	       			 		    		    		    		  			      				           	 	     	 				  
    global $zbp,$article;     							
    if($article->Type=="0"){       	  		 	
        			    	
    echo '<script src="'.$zbp->host.'zb_users/theme/suiranx_nav/assets/meta.js"></script>';           					
    echo '<div class="editmod"><label for="meta_suiranx_nav_from_name" class="editinputname">网站副标题:</label><input type="text" name="meta_suiranx_nav_art_name" style="margin: 5px 3px 0 3px; padding: 3px; line-height: 1.8em; height: 1.8em; font-size: 1.2em; width: 99%; color: #333;" placeholder="例如：百度一下你就知道" value="'.htmlspecialchars($article->Metas->suiranx_nav_art_name).'" style="width:50%;"/></div>';    	  	 			
        	  	  	 
    echo '<div class="editmod"><label for="meta_suiranx_nav_from_url" class="editinputname">网站地址（需带http://或https://）:</label></br><input type="text" id="meta_suiranx_nav_art_url" name="meta_suiranx_nav_art_url" style="margin: 5px 3px 0 3px; padding: 3px; line-height: 1.8em; height: 1.8em; font-size: 1.2em; width: 59%; color: #333;" placeholder="例如：https://www.baidu.com" value="'.htmlspecialchars($article->Metas->suiranx_nav_art_url).'" style="width:50%;"/><input type="button" class="btn" id="meta_btn" value="抓取tkd和favicon" onclick="GetData()"></div>';    		 	 	 	
    }     	 	 		 
}    	  			 	    			 	       	 		   	    	 	 	 	     	  	  		    		  	       	 						
    	      	    		  	 		     							     					 	     	 		 		         		     	 			 	 
//文章首图+默认文章图 		    	 		 		     			  		     		 		 	     		  		 	    	  				     	   	 	        		  	    	  	 		     		   	 	
function suiranx_nav_firstimg($article){      		  		       			      		 		 		    	 	 	 		    	 	    	     	 		       		 					      	 	  	      	  	  
  global $zbp;    	 	  		      				 	      	  		      		 				      	  		 	      			 	     		  	 		    			 	 		    	  	   	
  $randnum = mt_rand(1,1);    		 		 	      				  	      			 		      	  			         	      	 	 	 	          		         		      	  				 
  $pattern="/<img.*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/i";                  		    	     		   	 	    						 	    			 	  	    	 		 		       	  			     	 		 		        	       		   	 	    	 	  	  
  $content = $article->Content;                			 	 		    	  			 	    	    			      		         	  		       	 	  		    							     	  			 	    	  			 	      			 		
  preg_match_all($pattern,$content,$matchContent);                    	  	     	 				     			  	      	   		      		  	  	      	 		 	    	 	  			    		 	        		  		       	 				 
  if(isset($matchContent[1][0])) {                   	  		 	     		 	 		      		 			       	 			    	 	  		         	 	       		   	    		   	      	  					    	 	 			 
    $temp=$matchContent[1][0];                    			 	 	     	   	  	    	    			      	 		       			            			      	 	   	     	  	 		    	 				 	     				  	
  }else{                    	 	 	  	    			   		      	 	  	        			        	   	    	   				    		   	      		 	 		      	 			 	    		     	
    $temp=$zbp->host."zb_users/theme/suiranx_nav/image/no-img.png";    	 		 	           	                   		  	 	    				 	            		     			 	      		 			 	     	   	 	
  }                          	      	     	     	  		 		    		  	        	  		       	 	  		     							     				 		    	  	  	       		    
  return $temp;                   	     		    		  		        					     		  	  	    		  		 	     	 		        	 	  	       		   	    	 		  		    		 			 	
}        			 	 	     			   	      		 	      			     
//文章首图+默认icon图 		    	 		 		     			  		     		 		 	     		  		 	    	  				        		  	       		  	    						 	    	    	  
function suiranx_nav_firstimg2($article){      		  		       			      		 		 		    	 	 	 		    	 	    	    						      	  	 	 	    	 				      					 		
  global $zbp;    	 	  		      				 	      	  		      		 				      	  		 	     	 	 		     		 	  		       	 		       	  		 
  $randnum = mt_rand(1,1);    		 		 	      				  	      			 		      	  			         	      	  	  		     			 	       	  		        					 
  $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";                  		    	     		   	 	    						 	    			 	  	    	 		 		       	  			        	 	     	 		 	 	    		 	   	    	    	  
  $content = $article->Content;                			 	 		    	  			 	    	    			      		         	  		       	 	  		     	  	          					    	 	    	    	 			 		
  preg_match_all($pattern,$content,$matchContent);                    	  	     	 				     			  	      	   		      		  	  	      	 		 	       			 	    	 	 	 		     	    	      	 					
  if(isset($matchContent[1][0])) {                   	  		 	     		 	 		      		 			       	 			    	 	  		         	 	     	 	    	    		 				     							      	  		 	
    $temp=$matchContent[1][0];                    			 	 	     	   	  	    	    			      	 		       			            			     	 		  	     	   			     	 		 	 	    	  					
  }else{                    	 	 	  	    			   		      	 	  	        			        	   	    	   				        		      	 			 		     			 	 	     		 		 	
    $temp=$zbp->host."zb_users/theme/suiranx_nav/image/random_img/" . $randnum . ".jpg";    	 		 	           	                   		  	 	    				 	        	 	  	    	    		         		      					   
  }                          	      	     	     	  		 		    		  	        	  		       	 	  		    	 	  		      	   		      				          	  	 
  return $temp;                   	     		    		  		        					     		  	  	    		  		 	     	 		         	 		 	    	 	 	       	      	     	 		  	
}      				 		    	 	  			    		 			      		 		   
//缩略图        		 	      		  		    				 		     	 			 	     	 	 	       	 	 	 	      			 	       	  		      	 	 		 	    	  		 	 
function suiranx_nav_coverimg(){    	    			    		 	 		     	  		       					       	  			      	  	   	         			    		 		 		      		  		     	 		  	        	   
    global $zbp,$article;         	   		 
    if($article->Type=="0"){     	     	
    echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/suiranx_nav/assets/lib.upload.js\"></script>";
    echo '<p class="uploadimg"><span style="font-size: 1.1em;font-weight: bold;">缩略图：</span><br>
    <input name="meta_coverimg" id="meta_coverimg" placeholder="留空则调用默认缩略图" type="text" class="uplod_img" style="margin: 5px 3px 0 3px; padding: 3px; line-height: 1.8em; height: 1.8em; font-size: 1.2em; width: 59%; color: #333;" value="'.$article->Metas->coverimg.'" />
    <strong style="color: #ffffff; font-size: 14px;padding: 6px 18px 6px 18px; background: #3a6ea5;border: 1px solid #3399cc; cursor: pointer;">上传</strong>
    </p>';
    }    			 		 	
}        	 	      	  	 		          			    	 			 	     		 		 		      	 				     		  			
//【侧栏】重建【网站分类】模块      	  					    			   	      					 	        	         		 		     		 	 	 	    		   	 	     	  	  	    			   	         	 	 
//重新加载     					      	   		       		  	        	 	       								     	 	 			    				   	     	 	 			     		   		    				  	        	 	  
function suiranx_nav_aside_rebuild() {    	     	         		       	   		     			  		     		  	  	       		 		      	          	 	   	    		 			 	    	 			  	    				   	
	global $zbp;     	   	 	    	   		 	      	    	    					 		    			 		 	        		       	  				    				                    				  		
	$zbp->RegBuildModule('catalog','suiranx_nav_catalog');     	   		     	  		  	     	 	         		   	     				 	       			 			      	 		 	    		     	     	  		          		      		    	 
}     	  	  		     			 		      		   	         	           				     		  	 	    	       
function suiranx_nav_catalog() {    	   				      		  	     	 		 	 	     			 			     	   		        	        			 		         	    
	global $zbp;    		   	      				  	     	  	 			    				   	    								    	  	 		      	   			    					 		
	$s = '';     			 			     	 		 		     			 			    	 	  		      	 	 	       	  			        	        	 		 	  
	if ($zbp->option['ZC_MODULE_CATALOG_STYLE'] == '2') {    			  	 	    	  				     	  		       		          	 	 	 		     	 	 	 	    		 					    	 				 	
		foreach ($zbp->categorysbyorder as $key => $value) {    		    		    	   	 	     	 	 	  	    	           	  	 	 	    		  			     		 				       	 		 	
			if ($value->Level == 0) {      	  	 	     	 	   	     	 	 		      			 			     				 		     	   	      	 	   		     		     
				$s .= '<li id="navbar-category-'.$value->ID.'" class="li-cate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li>';    						 	       	  		     		 	 		    	  		       					 	     	 				      	    	 	      	    	
			}    	 	         	 		 	 	      		 	 	    	 	  	       	 		 	      					      		     	       	 			
		}      	 				    		  			     				  		    		    		    				  	           		    					 		    					 		
		foreach ($zbp->categorysbyorder as $key => $value) {    		  	 		    						        	   	      		 		 	       			      	      	      	  	 	    								
			if ($value->Level == 1) {       		         	 	  	    	 	  			    		  	        			 	 	    			 			      		 	  	    		    	 
				$s = str_replace('<!--' . $value->ParentID . 'end-->', '<li id="navbar-category-'.$value->ID.'" class="li-subcate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li><!--' . $value->ParentID . 'end-->', $s);     	   		      		   		    	     		    	 		 			    							      			  		          	      			 			
			}    	      	    	  	  	      				 		    	 		           				     	 			 	           	      	 	  	 
		}    		  	  	     					      		 			 	      		  	      		 	        	 		  	      	    	    	  			 	
		foreach ($zbp->categorysbyorder as $key => $value){    				 			    	 	  	      		  				     			   	    	 	  		        	  	      	 				     	 		 		 
			if($value->Level == 2) {     	 					      	 		 	      	 			      	 					      	 	 	        		       		 		 		      	  		 
				$s = str_replace('<!--' . $value->ParentID . 'end-->', '<li id="navbar-category-'.$value->ID.'" class="li-subcate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li><!--' . $value->ParentID . 'end-->', $s);     	 	 			       		        	  	 		       	 			     		           	 		 	       				     				   	
			}           	    			  		      			 	 	        		 	    	    		      			  		     	     	    	     		
		}foreach($zbp->categorysbyorder as $key => $value){    			 	  	    	 		  		       		 	     		 			      			 	 		     	 			      		 	        	    		 
			if ($value->Level == 3) {    				  		      	 	       				 	 	      	 	 		     	 		       								     		 				      		  	 
				$s = str_replace('<!--' . $value->ParentID . 'end-->', '<li id="navbar-category-'.$value->ID.'" class="li-subcate-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a><!--' . $value->ID . 'begin--><!--' . $value->ID . 'end--></li><!--' . $value->ParentID . 'end-->', $s);    	  	  	      	 	  		    	 		 			    	    	 	    	      	     	 				      	    		     		    	
			}    	 	    	    	   	       	  	               	    							        		 	       	 	 		    	 	  		 
		}foreach($zbp->categorysbyorder as $key => $value){    		 	 	 	      	   		      			 		     		 		 	    		               		     	  	 			     	   			
			$s = str_replace('<!--' . $value->ID . 'begin--><!--' . $value->ID . 'end-->', '', $s);     	 	 		     		   			    	  		       	 				 	    	 	 	       				  		        				      	 			 
		}foreach($zbp->categorysbyorder as $key => $value){    	 		 		       			 		     	  	  	    	 		         					      			    	    		   			     	   			
			$s = str_replace('<!--' . $value->ID . 'begin-->', '<ul class="sub-menu">', $s);    	 	  		      		 	 	      	 			        	    	    	 	  			    			 			       						     	 					
			$s = str_replace('<!--' . $value->ID . 'end-->', '</ul>', $s);    				  		      	  	      					 	     	  	 	 	      		  	      	  			     					         						
		}    		 				        	  	     				 			     	   	 	      		 			    		 				      	   			    	    	  
	}elseif($zbp->option['ZC_MODULE_CATALOG_STYLE'] == '1'){    	 	   		    					  	    	 	   	     				        	 			  	     	  		      	 	            	   	
		foreach ($zbp->categorysbyorder as $key => $value){    	  	 	      			 	         	  			     			 		     				 	       	    	        		  	     	 		   
			$s .= '<li id="navbar-category-'.$value->ID.'">' . $value->Symbol . '<a href="' . $value->Url . '">' . $value->Name . '</a></li>';    	 				       	 	 	 	        		 	      					     			 				    		  				    		 			       	 	   	
		}    	 				       	   			    		    		    		 	        	 	  			    	  			 	     	     	     	 	 			
	}else{    	 	 				      		 	 	    		 		 	     	   	 		    						      						 	    			 	 	           	 
		foreach ($zbp->categorysbyorder as $key => $value){    			    	     	 			 	     		 				    	    	 	     	  	  	    		   	 	    	 	  	 	    	 		 	 	
			$s .= '<li id="navbar-category-'.$value->ID.'"><a href="' . $value->Url . '">' . $value->Name . '</a></li>';     				  	    	  	 			    		  		 	    					 	      	 	  	     		    	     	           			 		  
		}    	    			    	  	 	      			  			      				 	     		  	      	    			    			 	           	  	
	}     	 				        					    			 		 	        	  	     			 			     	 					    		          	 	 		  
	return $s;     	 		 	     	   				    	  		 	        		 		    			  	       	   			     	 				     		 				 
}       				   	    	           	  	   	     				 	      	   	 	    	 		  		    	 			 		
function InstallPlugin_suiranx_nav() {       	 			      	  		     	  				      	  	 		    	 		  		    	 	 	  	      		 			
    global $zbp;    			          	     	
    suiranx_nav_create_database();     		 			     		  	 	 
	if(!$zbp->Config('suiranx_nav')->HasKey('Version')){     		  		      			 		     		  	  	     					 	        				       			      	 		 	 	     							     	 	 	 	    				  		
		$zbp->Config('suiranx_nav')->Version = '1.0';        			 	     				 	 	       				        	 	 	
		     			 		     	  		            		      				 	     	  	  	    		 			 	    	  	 	  
		$zbp->Config('suiranx_nav')->cate_id = '1,2,3,4,5,6,7,8,9,10';      	  		       		 		       			 	       			  	      		 	 	     	 	 	      			  			
		$zbp->Config('suiranx_nav')->art_num = '12';       	 	  	 	      		 	 	    					 		      			 		
		$zbp->Config('suiranx_nav')->art2_num = '4';      	 		        	  		      	   		 	        				
		$zbp->Config('suiranx_nav')->index_list_order= '4';    	 	  	 	    	 	         		   			    	 	    	
		$zbp->Config('suiranx_nav')->nofollow_switch = '1';        	  	      		  	     		 	 			      		 		     	 		 			    	  	         	 	 		 
		$zbp->Config('suiranx_nav')->flink_switch = '1';       	  	           		 	 
		$zbp->Config('suiranx_nav')->triple_num = '6';    	 	 				     	     	
		    	  	        	 	   		      			       	   	 	        				     	 	 	 		      		  	 
		$zbp->Config('suiranx_nav')->day30_switch = '1';    	  		 		       	 	 	    					 		     		 	       	   			       	         	 		 	  
		$zbp->Config('suiranx_nav')->footer_info = '<span><a target="_blank" rel="nofollow" href="https://www.mobanzhu.com/419.html">点我购买破解版</a></span><span>联系QQ：691322528</span><span><a target="_blank" rel="nofollow" href="http://beian.miit.gov.cn">川ICP备8888888号</a></span>';        				       	 		   	    	 	 	  	     	     	
		    		 		 	     			  	      	   	 		     				 	 
		    		 					      	          			 	 	     		  	  
		    		  		 	    	  		 		        	 	         	  	
		$zbp->Config('suiranx_nav')->list_type_switch = '1';      		  	     				 	 	      	  		     								
		//$zbp->Config('suiranx_nav')->nav_list_order= '4';     			 			      	   		    	   	       	  		   
    	  		  	    	  			 	    		  		 	    				 	 	
		$zbp->Config('suiranx_nav')->bear_switch = '1';       	   		        				    	 	 	        	   	 	
		$zbp->Config('suiranx_nav')->slogan = '免费收录站长们的网站 - 站长湾';     	   	 		    	  			 	    		  		 	     		 		 	
        $zbp->Config('suiranx_nav')->search_switch = '1';      				      	 	  	 	     	 	 		     	 		 		 
        $zbp->Config('suiranx_nav')->search_name_1 = '百度';     	 					      		 			    			    	    	    			
        $zbp->Config('suiranx_nav')->search_url_1 = 'https://www.baidu.com/s';    		     	    		 	 			    		  	 	     	 			  	
        $zbp->Config('suiranx_nav')->search_name_2 = '淘宝';     		 	 		    			 	        		 			             
        $zbp->Config('suiranx_nav')->search_url_2 = 'https://s.taobao.com/search';               	 		     		  	 	     								    			 	 	 
		     	    		      	 	       	  				     		 	 		 
		$zbp->Config('suiranx_nav')->seo_switch = '1';    	   	  	     		 	  	    		  			       	 	 	     	 	         	      	    	   		 	
		$zbp->Config('suiranx_nav')->index_title = $zbp->name.' - '.$zbp->title;      			              			     	     	    	   			      	 	 		     		 			 	    			 			 
		$zbp->Config('suiranx_nav')->index_keywords ='关键词1,关键词2,关键词3';         	       		 	 	             	 			      		         	  	       		   			    		 			 	    	   	       		 	    
		$zbp->Config('suiranx_nav')->index_description = '网站描述内容';          				       	  	      	  				      		 				
		    	 			 	     			 			     		  	  	    	 		 		 
    		  		      		 	 	 	    	    	 	     	      
		     	  			     	 	 		      	  	 		     	  	   	
		    						 	    				 		     	  		 	      		  	 	    		  		      		   	       			 	 	
		$zbp->Config('suiranx_nav')->ad1 = '<a href="链接地址"><img style="width:100%;height:100px;display:block;" src="图片地址"></a>';      	  		      	  	  	    		   		       		         					       		 	 	     		  			 
		$zbp->Config('suiranx_nav')->ad2 = '<a href="链接地址"><img style="width:100%;height:200px;display:block;" src="图片地址"></a>';       	 	 	        		       	 	   	    	 						      		 	 	    	   	       	 	 	  	
		     	 	 	 	    	 		 	 	    	 	 	  	       			         	  	     	     	     				 	  
		$zbp->Config('suiranx_nav')->scode = '1';         	  	   
		$zbp->Config('suiranx_nav')->submit_switch = '1';         		 
    	$zbp->Config('suiranx_nav')->tips = '小提示：认真填写和优质的提交内容我们会加快审核~';      			 	 	    	 	 				       		  	      				  
    	$zbp->Config('suiranx_nav')->pass = '2';      	 	      					      	   			    		  	        	 	    
		$zbp->Config('suiranx_nav')->editer = '2';     	     	     	  		 	        		       			 		        	 		  
		$zbp->Config('suiranx_nav')->jump = '';       	 					
		 	 		     	  	 		     	     	          		
		$zbp->Config('suiranx_nav')->btn_name = '投稿';        	 	  
		    	 	    	      				 	    					  	      			 		    			 				     			         	  			 
   	    $zbp->SaveConfig('suiranx_nav');      	           	  	 	      	 	       				   	      				      	     		    	     	     		  			     		   		      		 				
    }    	    			    		   	      	 					      	  				     			  		    			 	 		    			     	 		        		 	 		    		     	    	  					       	  		     				       		 		 		       		 		    			 			     			 				
}      	  	  	     		 	          					     	           	 	 	 		    							     		 		 	 
function UninstallPlugin_suiranx_nav() {    				 	        	   	 
    global $zbp;      	  	  	    		   		 
}    	  					    				 	 	        	  	      	 		 	    	     		      		  		     				  	