<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */  			 		 	    		 				     		      
	 				       	 	  	    	 	 	  	
//申请提交相关函数         	  
function suiranx_nav_cate(){    	  		 	      		 	  	
    global $zbp;       			 	    	 	 		 	
    $array=$zbp->GetCategoryList();     					      	    	  
	$str = '<select name="Cate" class="z_cate">';       	 			    		     	
	$str .= '<option value="0">--请选择分类--</option>';      			  	 	
     	  				
if($zbp->Config('suiranx_nav')->submit_cate_switch==1){     			   		
	foreach ($array as $cate){     				  	 
		$cates=str_replace(',', '，',$zbp->Config('suiranx_nav')->submit_cate);    		      
		$cates=explode('，',$cates);    						 	
		if(in_array($cate->ID,$cates)){     				  	
			$str .= '<option value="'.$cate->ID.'">'.$cate->Name.'</option>';       	  	 	 	
		}     			 		 
	}         	 					 
}else{       	 	 		
	foreach ($array as $cate){     		  	 	 
		$str .= '<option value="'.$cate->ID.'">'.$cate->Name.'</option>';      	 				      	 				
	}       		 				
}	    		   	  
	$str .= '</select>';     		   	     	 			 	 
	return $str;    		 	   	     	 	 			
} 	    	 	  	 	
function suiranx_nav_submit(&$template) {    		   	 	    	  		  	
	global $zbp;        	 					 
	$spostdom='';    			 			 
	$article = $template->GetTags('article');    				        	  	 	  
	if($article->ID == $zbp->Config('suiranx_nav')->pageid){     	    	     	 			   
    	if($zbp->Config('suiranx_nav')->jump!=""){    			  	 	    	   		 	
    		$suiranx_navjump='<script>var suiranx_navJump="'.$zbp->Config('suiranx_nav')->jump.'";</script>';    				 	 	    		 	 	  
    	}else{    			  			    	 	 	 	 
    		$suiranx_navjump='<script>var suiranx_navJump="'.$article->Url.'";</script>';     				              	
    	}    	 	 	  	    							 
		$zbp->header .= ''."\r\n".$suiranx_navjump.'<script src="'.$zbp->host.'zb_users/theme/suiranx_nav/assets/check.js" type="text/javascript"></script>' . "\r\n";       		       		 			  
   		//编辑器    	 	 	   
		if($zbp->Config('suiranx_nav')->editer==1){    				 	       			 			
    		$suiranx_navetool='[["source","|", "FontSize", "bold", "italic", "forecolor", "backcolor", "link", "justifyleft", "justifycenter", "justifyright", "insertimage", "pasteplain", "removeformat","formatmatch","Undo","Redo"]]';    		   	        	   	 
    	}elseif($zbp->Config('suiranx_nav')->editer==2){    			  			    	     		
    		$suiranx_navetool='[["source", "|", "undo", "redo", "|", "bold", "italic", "underline", "strikethrough", "superscript", "subscript","forecolor", "backcolor", "|", "insertorderedlist", "insertunorderedlist","indent", "justifyleft", "justifycenter", "justifyright","|", "removeformat","formatmatch","autotypeset", "pasteplain"], ["paragraph", "fontfamily", "fontsize","|", "emotion","link","music","insertimage","scrawl","insertvideo", "attachment","spechars", "map","|", "insertcode","blockquote", "wordimage","inserttable", "horizontal","fullscreen"]]';    	 	           		 	  
    	}else{      	   	        	 			
    		$suiranx_navetool='[["fullscreen", "source", "|", "undo", "redo", "|","bold", "italic", "underline", "fontborder", "strikethrough", "superscript", "subscript", "removeformat", "formatmatch", "autotypeset", "blockquote", "pasteplain", "|", "forecolor", "backcolor", "insertorderedlist", "insertunorderedlist", "selectall", "cleardoc", "|", "rowspacingtop", "rowspacingbottom", "lineheight", "|", "customstyle", "paragraph", "fontfamily", "fontsize", "|", "directionalityltr", "directionalityrtl", "indent", "|", "justifyleft", "justifycenter", "justifyright", "justifyjustify", "|", "touppercase", "tolowercase", "|", "link", "unlink", "anchor", "|", "imagenone", "imageleft", "imageright", "imagecenter", "|","simpleupload", "insertimage", "emotion", "scrawl", "insertvideo", "music", "attachment", "map", "gmap", "insertframe", "insertcode", "pagebreak", "|", "horizontal", "date", "time", "spechars", "wordimage", "|","inserttable", "deletetable", "insertparagraphbeforetable", "insertrow", "deleterow", "insertcol", "deletecol", "mergecells", "mergeright", "mergedown", "splittocells", "splittorows", "splittocols", "charts", "|", "print", "preview", "searchreplace", "drafts"]]';      			 		     					  
    	}     		  			         	    	 	
	    $suiranx_navvcode ='<img id="reg_verfiycode" class="ccode" title="点击刷新" style="border:none;vertical-align:middle;width:'.$zbp->option['ZC_VERIFYCODE_WIDTH']. 'px;height:' . $zbp->option['ZC_VERIFYCODE_HEIGHT'] . 'px;cursor:pointer;" src="' .$zbp->validcodeurl . '?id=suiranx_nav" alt="" title="" onclick="javascript:this.src=\'' . $zbp->validcodeurl . '?id=suiranx_nav&amp;tm=\'+Math.random();"/>';      	  	 	       		 		
	    $suiranx_navUEditor ='<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script><script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script><textarea name="Content" id="editor_Content" datatype="*"></textarea><script type="text/javascript">var editor = new baidu.editor.ui.Editor({toolbars: '.$suiranx_navetool.',initialFrameHeight: 350,});editor.render("editor_Content");editor.sync("Content"); </script>';     		  	 	     		 	  	
	    if($zbp->user->Alias!=""){     	 	 		     			  	 	
	    	$visitor = '.$zbp->user->Alias.('.$zbp->user->Name.')&nbsp;';          		    	  	 	  
	    }else{    				 	      				    
		    $visitor = ''.$zbp->user->Name.'';    	 	  	 	        		 	
		}    			 				    		 	    
		$article->Content .='<input type="hidden" name="token" id="token" value="'.$zbp->GetToken().'" />';    			 	 		    	 	 		 	
		$zbp->header .= '<link rel="stylesheet" href="'.$zbp->host.'zb_users/theme/suiranx_nav/assets/style.css" type="text/css">';      			 			
		    	 	 			 
	    $article->Content .='<div class="page-tips">'.$zbp->Config('suiranx_nav')->tips.'</div>';      	  		   
	        	  	  		
	        	 				 	
	    $article->Content .='<div class="submit-form">'.$spostdom.'<p class="item"><span class="title">网站标题</span><br><input required="required" class="z_title" id="edtTitle" size="100" name="Title" type="text" placeholder="必填"></p>';      		 	   	
	         	    		
		$article->Content .='<p class="item"><span class="title">网站副标题</span><br><input name="suiranx_nav_art_name" class="z_meta" size="100" type="text"></p>'; 	        	 	  		 
		 
        $article->Content .='<p class="item"><span class="title">网站图标url</span><br><input name="coverimg" class="z_meta" id="meta_coverimg" size="100" type="text"></p>
		'; 

        $article->Content .='<p class="item" style="display:none;"><span class="title">网站关键词</span><br><input name="artkeywords" class="z_meta" id="meta_artkeywords" size="100" type="hidden"></p>
		'; 
        $article->Content .='<p class="item" style="display:none;"><span class="title">网站描述</span><br><input name="artdescription" class="z_meta" id="meta_artdescription" size="100" type="hidden"></p>'; 		       		 	 
		     	 	 		 
    		 		 		
		$article->Content .='<p class="item"><span class="title">网站地址<span class="intro">(带http://或https://)</span></span><br><input name="suiranx_nav_art_url" class="z_meta" size="100" type="text" placeholder="必填">   <input type="button" class="btn" id="meta_btn" value="获取TKD" onclick="Get()"  style="width:14%;height:36px;background:#ff5656;color:#FFF;cursor:pointer;border:0;">  </p>';     						  
    			  		 
     	 		   	
		         		  	  	
    		    		
		$article->Content .='<p class="item"><span class="title">所属分类</span><br>'.suiranx_nav_cate().'</p>'; 			    			    	
        	 	 			
	    $article->Content .='<p class="item"><span class="title">网站简介</span><br>'.$suiranx_navUEditor;        			    	 	   		
	     		  	  				   		         	  
	    if($zbp->Config('suiranx_nav')->scode){    	  	   	      		  	 
		    $article->Content .='<p class="item vcode"><span class="title">验证码</span><br><input required="required" name="verifycode" class="z_vcode" size="20" type="text">'.$suiranx_navvcode.'</p>';     		  		     	 			  	
		}      		        			  	  
	    $article->Content .='<p class="item"><button class="post-btn">提交</button></p></div>';     			     	 	 	 		     			 	 	
		$s=	'';     	  				    	    			
		$article->Content .=$s;    			 	         		 	 	
	}          		          		
}           	 	    		 	  	     		 	  	 
      								    	  		 		