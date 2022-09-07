<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */  			       			 	      		  				
require '../../../../zb_system/function/c_system_base.php';           	 	
$zbp->Load();    					 	     			 	           		        	 	 		
Add_Filter_Plugin('Filter_Plugin_Zbp_ShowError','RespondError',PLUGIN_EXITSIGNAL_RETURN);     			   	    			  		       		 			        			 
if (!$zbp->CheckPlugin('suiranx_nav')) {$zbp->ShowError(48);die();}    		 	   	    	 			 		     				 	     		 	 			
if(!$zbp->ValidToken(GetVars('token','POST'))){$zbp->ShowError(5,__FILE__,__LINE__);die();}    		 	  	      	 	  		    	  		       		 	 		 
if(empty($_POST['Title'])){     		   		     		  			          		      	 	  	
    $zbp->ShowError('标题不能为空！');die();        			      					 	    	  		  	     						 
}    					 	       		 			    			 	       	  					
if(empty($_POST['Content'])){      	 	  	    	   	 		        	          					
    $zbp->ShowError('正文不能为空！');die();    			 	  	    	  	 		     		   			    		  	 		
}       			      	 	 	 		    	 	 	       		 			 	
if(!$zbp->CheckValidCode(GetVars('verifycode','POST'),'suiranx_nav') && $zbp->Config('suiranx_nav')->scode){     	 	  		      			 		    			  			     	   			
    $zbp->ShowError('验证码错误，请重新输入');die();    				 			    			 		 	     	 	 	      			     
}    	 	 	  	    			   	     	 						    	 			 		
    		  	          	 	 	    		 	  	 
    $a = new Post();    	   		      		 		 		         			     	   			
	$a->CateID = $_POST['Cate'];     	    			    				  		    		 	 	       	  				
   	      			   	        	   	    	   	   
	    $a->Metas->coverimg = $_POST['coverimg'];	  	   	    				 		     	   	 	      	 	 			
        $a->Metas->suiranx_nav_art_name = $_POST['suiranx_nav_art_name'];     	 	  		    	 			 	        	  		
		$a->Metas->suiranx_nav_art_url = $_POST['suiranx_nav_art_url'];     		  			 
		$a->Metas->artkeywords = $_POST['artkeywords'];     	  			 
		$a->Metas->artdescription = $_POST['artdescription'];        	  	
       	  	 	 	    		 		  	      	         	   		 	
    $a->AuthorID = $zbp->user->ID;    		  	 	     			 	  	     	  	  	    	 	 		 	
    $a->Tag = '';    		   			         	      	 					     	   	   
    if($zbp->user->Level <= $zbp->Config('suiranx_nav')->pass){    	   	          	   	    		 	   	    	 	 			 
        $a->Status = 0;    			    	    		 	 			     	 		 	       	 			 
    }else{       		 	         		 	    	   		 	    	   	 	 
        $a->Status = 2;    	 			  	     	 	 	        	 		        	  		 
    }      	   	       	 	 		    	 		   	      		 		 
    $a->Type = ZC_POST_TYPE_ARTICLE;    			 	 	     				 		     						 	      	 		  
    $a->Alias = '';       			 	     	 	  	     	  	 			    		  	 		
    $a->IsTop = false;    	 		 			     	   			    	 			 		    		 	   	
    $a->IsLock = false;    		              	 		     	  			     	 	    	
    $a->Title = $_POST['Title'];   				 	     			 	  	     	 	 	 	     	 	 			
    $a->Content = $_POST['Content'];      				 	 	
    $a->IP = GetGuestIP();       		 	     	 	 	 	     	 		  		    	 	  	 	
    $a->PostTime = time();    	 				 	      				          	           	   
    $a->CommNums = 0;    	 					     		 			      		  		      	 				  
    $a->ViewNums = 0;    					  	    	 	   	        		 		    	  	 	  
    $a->Template = '';     	  				     	   	         		 		    	 				  
    $a->Save();    		 	 	 	    		 	   	    			  			    	  		 	 
    echo '提交成功！请等待审核';die();    		   		       		   	        			     		 	 			
?>