<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */ 	      			 		
    		  		  
require '../../../zb_system/function/c_system_base.php';        		   		
require '../../../zb_system/function/c_system_admin.php';    			  			     	   	 	    				  	        	 	 	
$zbp->Load();    		  	  	    			 		 	     	 		  	    		   			
$action='root';    	   				    	 	  	 	    			 			     		 			 	
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}        		        	 				    		  	 	      		 		  
if (!$zbp->CheckPlugin('suiranx_nav')) {$zbp->ShowError(48);die();}    	 				       			 			     	 	 	 	      		   	
        	  	    	 			 	     	 	          	  			 
$blogtitle='随然Nav主题配置';	  	     	  		 	    		           	     	    	 	           				           			    		  				     	 		       	 	 		 	
$act = "";   		 	 	      	 			      	  		      	      	    	  	 	  
if ($_GET['act']){    			 	       	  			       	 	 		     	  	 	 	         		      			   	
$act = $_GET['act'] == "" ? 'base_set' : $_GET['act'];     	 			      	    			    			 	 		      						       		  	    	 				  
}     	 	 	      		 	  	      	  	 		     	 					
    			  	       		 		            	      				 	 
require $blogpath . 'zb_system/admin/admin_header.php';    		 	 			     		  			       	  	       	 		 	
require $blogpath . 'zb_system/admin/admin_top.php';    	   				    	 	 		         					     					 	
         			     		  	 	     					       		     
$percolors = array("12A7B4", "1d6aa1", "7a4067", "eb681c", "222222", "ed2828");     	  	 			     	    	     			   		     	 	   	
//基础设置    		 		 	     			 				    	 		 	      	 			  	       	 	           	 	    	 				 	    			   	     	    		     	 	     
if(isset($_POST['art_num'])){       	 	       	 	 	 	    	    			       		 		      	  			    	 	 	       		 	  		    						 	    	 	 				    		    		
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();      				      			 		 	    			  		       	 			     	 	 		 	    	      	     		  	         		       	  			 	          		
    //$zbp->Config('suiranx_nav')->custom_color = GetVars('bgcolor', 'POST');       		  	  	    	     		    								    		   		 
    	 				 	    	 			 		      	  		    			  		 
        	  		 		    				        	           	 		  		
    $zbp->Config('suiranx_nav')->cate_id = $_POST['cate_id'];   	  	     		 					     	 		       	    		     	 				 	    	    		       	  	        	            	         		   		
    $zbp->Config('suiranx_nav')->art_num = $_POST['art_num'];      	 	    
    $zbp->Config('suiranx_nav')->art2_num = $_POST['art2_num'];      		 	 		
        			 			 
    $zbp->Config('suiranx_nav')->index_list_order = $_POST['index_list_order'];           	   
        	  		 		
       				 
    $zbp->Config('suiranx_nav')->data_switch = $_POST['data_switch'];      		    	
        		 	  		
    $zbp->Config('suiranx_nav')->fast_nav_switch = $_POST['fast_nav_switch'];        	 	    	  		 	 
    $zbp->Config('suiranx_nav')->day30_switch = $_POST['day30_switch'];      	  	  		
        	   			      		 	 	     	 	 	 	      	  	   
    $zbp->Config('suiranx_nav')->nofollow_switch = $_POST['nofollow_switch'];      	 				 	     		    	    		  		 	    	   	   
    $zbp->Config('suiranx_nav')->go_switch = $_POST['go_switch'];         	   		 	        				    		 	 		     			    	
        	  				      	 		 		      	 		 	      	   		
    $zbp->Config('suiranx_nav')->flink_switch = $_POST['flink_switch'];       	 	 	    	 					       		 	      	      	
        		 	 			    			  	      		 				      	  	 		
    $zbp->Config('suiranx_nav')->footer_info = $_POST['footer_info'];      	    		 			      	    			      			 	     			     
        		 		  	    	 	 	 	      			  		       		 	 
    $zbp->Config('suiranx_nav')->footer_code = $_POST['footer_code'];   		 				     	   		 	    	 			 	         			      	 		  	      		  		    	    	        		 			    	 						    			   		
    $zbp->SaveConfig('suiranx_nav');     	     	        		      	 	 	  	    	 				 	    	   		       		 		       		    	    		 	  	      	 	   	     				 		
    $zbp->ShowHint('good'); 	     		   	      				       	  					      	  		 
}        	  	   
//申请收录设置      	 				 
if(isset($_POST['tips'])){          		    
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();            	  		
	$zbp->Config('suiranx_nav')->tips = $_POST['tips'];    		    			   	 
	$zbp->Config('suiranx_nav')->scode = $_POST['scode'];        	 	  
	$zbp->Config('suiranx_nav')->submit_switch = $_POST['submit_switch'];      				 	 
	$zbp->Config('suiranx_nav')->editer = $_POST['editer'];     	  			 
	$zbp->Config('suiranx_nav')->pass = $_POST['pass'];    								
	$zbp->Config('suiranx_nav')->pageid = $_POST['pageid'];	    	 	  		 
	$zbp->Config('suiranx_nav')->btn_name = $_POST['btn_name'];	     	 		    
	$zbp->Config('suiranx_nav')->submit_cate = $_POST['submit_cate'];	    	     		
	$zbp->Config('suiranx_nav')->submit_cate_switch = $_POST['submit_cate_switch'];	      	 	    
	    		   		 
	$zbp->Config('suiranx_nav')->jump = $_POST['jump'];        	 	 	 	
	    		 		   
        	   		  
    $zbp->SaveConfig('suiranx_nav');      	    	      	     
    $zbp->ShowHint('good');      		          	     
}     		   	  
//列表页模板 	  	      			 	 	     	 	 	  	    	   		 	    			  			
if(isset($_POST['list_type_switch'])){    	   	 		    		 	  		    	      	    			   	     	 						        	 	       	 		      						      	   				      	  		 
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();    			 	     			 	 	      	            	   				
    $zbp->Config('suiranx_nav')->list_type_switch = $_POST['list_type_switch']; 	   	 			     				  	 
    $zbp->Config('suiranx_nav')->cate_id2 = $_POST['cate_id2'];      	 		 	  
    //$zbp->Config('suiranx_nav')->nav_list_order = $_POST['nav_list_order'];            	   			 
             	  		      		 		 	    		  	   
$zbp->SaveConfig('suiranx_nav');       		        	 	  		    	    		     	   				     	     		 			      	 	   		    	  	 	 	    		   	 	      	   		
	$zbp->ShowHint('good');		     					 	     	 				        	  		
}       			   
//SEO设置    	 		         		 				    				 	 	       	  	         		 	    			  	      			 	 	     	 	 	  	     		 	  	      		  		    		 	 		     					 	 
if(isset($_POST['seo_switch'])){    	   	 		    		 	  		    	      	    			   	     	 						        	 	       	 		      						      	  		        	  		      	     	        	  	 
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();         		 	 	 
        	 				 	
    $zbp->Config('suiranx_nav')->seo_switch = $_POST['seo_switch'];     //首页seo开关     		 				    			  			    			  		         	  	     				 		     					 	     			 	 	      	            	  	      		   	        				     	     		
    $zbp->Config('suiranx_nav')->index_title = $_POST['index_title'];     //首页title    	 						    	 		 	        						     	   			    	 	   	     	 			 		     		 			      	 		 		     	  			         	  	    	 		 	 	      	   	 
    $zbp->Config('suiranx_nav')->index_keywords = $_POST['index_keywords'];     //首页keywords        	 		 	       		  			    		 			      	   		 	      		 	        	   		    	 	  	      	 		        		   			    		 		  	    	   	  	        	   
    $zbp->Config('suiranx_nav')->index_description = $_POST['index_description'];     //首页description        		 	 		        		 		 						 	    	  	 	 	       		 	       	    	    	 	 		      	  	   	
	             	  		      	   	      	 	   	       	  		      	 		   
$zbp->SaveConfig('suiranx_nav');       		        	 	  		    	    		     	   				     	     		 			      	 	   		    	  	 	 	     		 		 	      		 	      			  	 	    								
	$zbp->ShowHint('good');		     					 	    	 	 	  	    		  	  	     		 	 	     								
}        	  		 
//动画/幻灯片设置    		 	 	      	   	        	 	  	     		  	 		     		 	        		   	     		 	 		 
if(isset($_POST['slider_switch']) || isset($_POST['slogan']) || isset($_POST['bear_switch'])){    	   			     		 		  	    	 	 	 	      	 					    	 		 	 	     		         			  	  
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();           	  
        	   		 	
    $zbp->Config('suiranx_nav')->bear_switch = $_POST['bear_switch'];     		 		  	
        		 				 
    $zbp->Config('suiranx_nav')->slider_switch = $_POST['slider_switch'];     //幻灯片总开关      				       	 	        				  		     			  		        	 	     		 	  		    								
    $zbp->Config('suiranx_nav')->slogan = $_POST['slogan'];               	 	 	  	
        			   		
                
    $zbp->Config('suiranx_nav')->search_switch = $_POST['search_switch'];       	  	   	
    $zbp->Config('suiranx_nav')->search_name_1 = $_POST['search_name_1'];      		  	 		
    $zbp->Config('suiranx_nav')->search_url_1 = $_POST['search_url_1'];      		 	 	 
    $zbp->Config('suiranx_nav')->name_1 = $_POST['name_1'];        	 	  	 	
        				    
    $zbp->Config('suiranx_nav')->search_name_2 = $_POST['search_name_2'];          		 	
    $zbp->Config('suiranx_nav')->search_url_2 = $_POST['search_url_2'];       	 	   
    $zbp->Config('suiranx_nav')->name_2 = $_POST['name_2'];    		 	 			
           	    
    $zbp->Config('suiranx_nav')->search_name_3 = $_POST['search_name_3'];      		  		  
    $zbp->Config('suiranx_nav')->search_url_3 = $_POST['search_url_3'];     	 			 	
    $zbp->Config('suiranx_nav')->name_3 = $_POST['name_3'];     	      
         	   	  
    $zbp->Config('suiranx_nav')->search_name_4 = $_POST['search_name_4'];          	  	
    $zbp->Config('suiranx_nav')->search_url_4 = $_POST['search_url_4'];       	 		 	
    $zbp->Config('suiranx_nav')->name_4 = $_POST['name_4'];       	  		  
        		  	  	
    $zbp->Config('suiranx_nav')->search_name_5 = $_POST['search_name_5'];        	 				
    $zbp->Config('suiranx_nav')->search_url_5 = $_POST['search_url_5'];      					 		
    $zbp->Config('suiranx_nav')->name_5 = $_POST['name_5'];         		     	
         	  		 	
    $zbp->Config('suiranx_nav')->search_name_6 = $_POST['search_name_6'];        			  	
    $zbp->Config('suiranx_nav')->search_url_6 = $_POST['search_url_6'];     		 					
    $zbp->Config('suiranx_nav')->name_6 = $_POST['name_6'];         		 	 	 	
        	  	  	 
    $zbp->Config('suiranx_nav')->search_name_7 = $_POST['search_name_7'];      					   
    $zbp->Config('suiranx_nav')->search_url_7 = $_POST['search_url_7'];       			 		 
    $zbp->Config('suiranx_nav')->name_7 = $_POST['name_7'];       	 			  
        		 				 
    $zbp->Config('suiranx_nav')->search_name_8 = $_POST['search_name_8'];      			  			
    $zbp->Config('suiranx_nav')->search_url_8 = $_POST['search_url_8'];         	 			 	 
    $zbp->Config('suiranx_nav')->name_8 = $_POST['name_8'];          	  	
        	 		   	
    $zbp->Config('suiranx_nav')->slider1_switch = $_POST['slider1_switch'];       //幻灯片1     	   			     	 				         		 	    	   			     	 	  	 	     	  				    	  	 			
    $zbp->Config('suiranx_nav')->slider_title1 = $_POST['slider_title1'];         					         	   	     	      	     	 	   	           	     	  			      	  		  
    $zbp->Config('suiranx_nav')->slider_img1 = $_POST['slider_img1'];     		    	    	 		 		      	  		 	       	 	 	     		  	 	     	  		 	    			 			 
    $zbp->Config('suiranx_nav')->slider_url1 = $_POST['slider_url1'];     		 				        	  		    		 		 	          			     		   		    		          	 		 			
    		 		 		      		 	      	   				    	 		   	    	  		  	     			   	    			 		 	
    $zbp->Config('suiranx_nav')->slider2_switch = $_POST['slider2_switch'];       //幻灯片2    	            	  	       		  			     		 		 	      	 	          	 	       			 				
    $zbp->Config('suiranx_nav')->slider_title2 = $_POST['slider_title2'];    			  		     	 		         	 	 			      	 		 	    	 		 	      						 	    		 		  	
    $zbp->Config('suiranx_nav')->slider_img2 = $_POST['slider_img2'];     	 		        	 		        	  		 	    	    		        	 		     	 		   	        		 	
    $zbp->Config('suiranx_nav')->slider_url2 = $_POST['slider_url2'];        					        	 	 	     	  				    				 			        	         				 	    			 		 	
     		  		       				        	 	         	  	 	       		 		    	 						     	    	 
    $zbp->Config('suiranx_nav')->slider3_switch = $_POST['slider3_switch'];       //幻灯片3           		       			  	        	   	       	   		       	         	 	  		      				  
    $zbp->Config('suiranx_nav')->slider_title3 = $_POST['slider_title3'];    	 			 		     		 		          			      				  	    	 			 		     	 	  	       	  			
    $zbp->Config('suiranx_nav')->slider_img3 = $_POST['slider_img3'];        	  	     	    	     			  	 	      	 	       	  			      			 	 		      	  		 
    $zbp->Config('suiranx_nav')->slider_url3 = $_POST['slider_url3'];         						 	    			 	  	     	 			 	    							     	 	 		      		 	 	       	  		 	
      				 	    	  	          					      	  				       	 			    	 		  		    			 	   
    $zbp->Config('suiranx_nav')->slider4_switch = $_POST['slider4_switch'];       //幻灯片4           	 	 	     		    	     	  			        					    		 	 	 	    	 						    	  		 		
    $zbp->Config('suiranx_nav')->slider_title4 = $_POST['slider_title4'];       	          	           				        	  	      	 	 			        		  	     			 		 
    $zbp->Config('suiranx_nav')->slider_img4 = $_POST['slider_img4'];    		 		  	    			 		 	    				 			      	   		      				 	     			           	    
    $zbp->Config('suiranx_nav')->slider_url4 = $_POST['slider_url4'];         	 	    	    						      		 			         				     		 	   	    	    			     			  	 
        		 			 	     		 	 	      			   	    					 		     	  	 	     	  				     			 	 		
    $zbp->Config('suiranx_nav')->slider5_switch = $_POST['slider5_switch'];       //幻灯片5          	 				        			     		  	 	     						 	    		  		 	     				 	      	  			 
    $zbp->Config('suiranx_nav')->slider_title5 = $_POST['slider_title5'];    		   	      	  			      	    	      				 	         					     	   	      		  	   
    $zbp->Config('suiranx_nav')->slider_img5 = $_POST['slider_img5'];     	  			     	 			  	     					       	    		    	   	 	     							       	 			 
    $zbp->Config('suiranx_nav')->slider_url5 = $_POST['slider_url5'];         			 	 		     	 	 		     		  	        	 				     		     	    	 		  	       			  	
        							      		         	   		       	 	          		   	    				   	     		 	 		
$zbp->SaveConfig('suiranx_nav');     			 	      		 		       	 					      	  				       		 		      		 		     								
	$zbp->ShowHint('good');    	 	 			      	    		    	 	    	     		  	      		  		 	    	 		   	       	 		 
}    	     	   	  
//广告设置    		 				        	 	 	    				 			    	 						      	 			       	 	 		      			 		     		 	 	      			 			      		  		    		 		 		    		 			 	
if(isset($_POST['ad1_switch']) || isset($_POST['ad2_switch']) || isset($_POST['ad3_switch']) || isset($_POST['ad4_switch'])){    			   		        	  	      	 	 		    								     	  		      	  					      		 		     			 		 	    			 			      				 		         			    	 	  			
    if (function_exists('CheckIsRefererValid')) CheckIsRefererValid();  	 	 	 	     		  	      	 	         	      	     			 			     	 			 	    	  	 	 	     	  	  	    		  	           	 		    				  	        				 
    $zbp->Config('suiranx_nav')->ad1 = $_POST['ad1'];    		 		 		     	 			      			 				    	   	 		     					 	        		  	 		    	  	        		           	 					      					      	 	        		 	 	       				       					       	    		     		  			      		 		 	
    $zbp->Config('suiranx_nav')->ad2 = $_POST['ad2'];    	      	    					       	 	  	 	    	  	   	    			  	      	 	 				    					 	      		  			     	  			     			  	 	        	  	      	   	 
    $zbp->Config('suiranx_nav')->ad3 = $_POST['ad3'];    	  	 	 	    	 	  	      					 	       	 		      		 				     		 	        					 		      	 		        	 		 	    		 	 			    		  	 	       						
    $zbp->Config('suiranx_nav')->ad4 = $_POST['ad4'];   	 	 	 	     			  		    				  	     	 	 		 	    	  			 	     	 	  	     	 	     
        	   		       				       	 	 	        	  	       			    	    	 	  	          		 	      			 	     			 		                  	   	 	      			    
    $zbp->Config('suiranx_nav')->m_ad1 = $_POST['m_ad1'];    	 					     	 		  	     	  	 			     	 			 	    		 				     	    		    	     		   		     	  		         		 	 	        	  	     			 	      					 	       	 	  	    	    	 	    		 	 		     		 		  	    	    	 	
    $zbp->Config('suiranx_nav')->m_ad2 = $_POST['m_ad2'];          		     	  		 	    	  		  	      	         	 			  	      				        	 	 	     	  			 	    		 				     	   	       		 		       		 				 
    $zbp->Config('suiranx_nav')->m_ad3 = $_POST['m_ad3'];      		   	     	  				    		   			      	  	 	    	 		 	      	 	  			    					       	 	  		        	  	     		   			    	    		      	 	 		 
    $zbp->Config('suiranx_nav')->m_ad4 = $_POST['m_ad4'];     		    		         			       				       	   	      	  		  
         		  	 	       				        		      			      				      		  				     	  	 		    	     		    	 			 		     							     			 		      		          	 		        	      
    $zbp->Config('suiranx_nav')->ad1_switch = $_POST['ad1_switch'];    		 				     		          		 	   	      				      						       			      					 		     		  	 	     				 		    	  		 		     	 		 		       		         					 
    $zbp->Config('suiranx_nav')->ad2_switch = $_POST['ad2_switch'];    	  	  		    				 	         			 	     	 					     	  	  	     					          				         		     	 			 	     			  			    	 			         	 	   
    $zbp->Config('suiranx_nav')->ad3_switch = $_POST['ad3_switch'];    			 		      	     		     	  		        	    	    	 	 	        		  		     	   				    	 			 	      	  			       			  	      		 	           	  
    $zbp->Config('suiranx_nav')->ad4_switch = $_POST['ad4_switch'];     	 		   	    		 				     		 	 		     	   	 	      		 	 		
$zbp->SaveConfig('suiranx_nav');     	 		 	      	  			        		            	 	       			 	        	 		     			  		    	    		     	  	         		 	 		    			   		     	 	  	 
	$zbp->ShowHint('good');      				      	 	   	     					 	     		 		 	     		  	 	      			 	 	     					 	    	  	 	        					     	 				 	    								    	 		 		 
}           	 	  	 
//其他功能     		  	       			 		           		
if(isset($_POST['qq_card_switch']) || isset($_POST['qq_card'])){     		 					     				 	      		 	 	 
    $zbp->Config('suiranx_nav')->qq_card_switch = $_POST['qq_card_switch'];        	   	   
    $zbp->Config('suiranx_nav')->qq_card = $_POST['qq_card'];    	 			 	 
        		  	 		
    $zbp->SaveConfig('suiranx_nav');     	 		 	      	  			        		            	 	       			 	    			 		 	    	  		 		       					
	$zbp->ShowHint('good');          	  	 		      			 			          		
}       	  			 
//自定义css     		  	      	 	 		  
if(isset($_POST['diy_css'])){     		 					    		  	  	
    $zbp->Config('suiranx_nav')->diy_css = $_POST['diy_css'];    	 		 			    	   		  
$zbp->SaveConfig('suiranx_nav');     	 		 	      	  			        		            	 	       			 	    			 		 	    						  
	$zbp->ShowHint('good');          	  	 		       				  
}     		  		        			 		     	 			 	    					  	
?>
<link href="assets/colpick.css" rel="stylesheet" /> 
<script src="assets/colpick.js" type="text/javascript"></script>
<style>
.select-cate option{margin-right: 10px;white-space: normal;display: inline-block;cursor: pointer;}
#divMain a,#divMain2 a{color:#227fe1}
input.button,input[type=submit],input[type=button]{background:#227fe1;border:1px solid #227fe1}
input.button:hover{background:#0d71e3}
.table_hover>tbody>tr:hover>td,.table_hover>tbody>tr:hover>th,.table_hover>tbody>tr>td:hover,.table_hover>tbody>tr>th:hover{background:#e9f3fc}
#carea h3{font-size:1.8em}
.red{color:red}
.m5{margin:5px 0}
.uploadimg strong{color:#fff;padding:5px;margin-left:10px;background:#227fe1;border:1px solid #227fe1;cursor:pointer}
.uploadimg{padding:5px 0}
.uploadimg strong:hover{background:#2285ed}
input.colorpicker{border-width:2px;border-right-width:30px;width:90px;height:28px;line-height:28px;cursor:pointer;font-family:'Lucida Console',Monaco,monospace;box-sizing:border-box;padding:0;margin-left:10px;float:left;text-align:center;border-radius:5px}
.color-box{float:left;width:28px;height:28px;margin:5px;cursor:pointer;box-sizing:border-box;border-radius:100px}
.color-box-picker{margin:5px 0 0 10px;width:86px;height:30px;display:inline-block}
</style>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
      <?php suiranx_nav_SubMenu($act);?>
        <a target="_blank" href="https://www.mobanzhu.com/">
          <span class="m-left" style="color:red;">更多作品</span>
        </a>
        <a>
          <span class="m-left" style="color:red;">该主题由模板著 Www.Mobanzhu.Com 打包</span>
        </a>
  </div>
</div>
  <div id="divMain2">      
<?php if ($act == 'base_set') { ?>
<table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
    <tr>
        <th width="15%"><p align="center">名称</p></th>
        <th width="50%"><p align="center">设置</p></th>
        <th width="25%"><p align="center">说明</p></th>
    </tr>
    <form enctype="multipart/form-data" method="post" action="save.php?type=logo">
        <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
        <tr>
        <td><p align="center">LOGO(1360*300)</p></td>
        <td>
        <p align="left"><input class="add-width" name="logo.png" type="file"/><input name="" type="Submit" class="button" value="保存"/></p>
        </td>
        <td><p align="left"><img class="logo_bg" src="<?php if(file_exists("image/logo.png")){echo "image/logo.png";}else{echo "image/logo_default.png";}?>" height="40px"></p></td>
        </tr>
    </form> 
    <form enctype="multipart/form-data" method="post" action="save.php?type=darklogo">
        <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
        <tr>
        <td><p align="center">暗黑模式LOGO(1360*300)</p></td>
        <td>
        <p align="left"><input class="add-width" name="darklogo.png" type="file"/><input name="" type="Submit" class="button" value="保存"/></p>
        </td>
        <td><p align="left"><img class="logo_bg" src="<?php if(file_exists("image/darklogo.png")){echo "image/darklogo.png";}else{echo "image/darklogo_default.png";}?>" height="40px"></p></td>
        </tr>
    </form>     
    <form enctype="multipart/form-data" method="post" action="save.php?type=favicon">
        <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
        <tr>
        <td><p align="center">favicon图标(32*32)</p></td>
        <td>
        <p align="left"><input class="add-width"  name="favicon.ico" type="file"/><input name="" type="Submit" class="button" value="保存"/></p>
        </td>
        <td><p align="left"><img src="<?php if(file_exists("image/favicon.ico")){echo "image/favicon.ico";}else{echo "image/favicon_default.ico";}?>" height="20px"></p></td>
        </tr>        
    </form>
    <form id="form1" name="form1" method="post">
        <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?> 
        <!--
        <tr>
        <td><p align="center">颜色设置</p></td>
        <td>
            <div id="loadconfig">            
            <?php foreach ($percolors as $value) {echo "<div class='color-box' data-color='" . $value . "' style='background-color:#" . $value . "'></div>"; }?>
            </div>
            <div class="color-box-picker">
                <input type="text" id="bgpicker" class="colorpicker" name="bgcolor" value="<?php echo $zbp->Config('suiranx_nav')->custom_color;?>" style="border-color:#<?php echo $zbp->Config('suiranx_nav')->custom_color;?>" />
            </div> 
        </td>
        <td><p align="left">选择网站颜色风格，支持自定义颜色</p></td>
        </tr>-->
        <tr>
        	<td><p align="center">首页分类调用</p></td>
        	<td>
        	    <div class="select-cate">
				    <span style="color:#ff0000;">点击选择分类:</span>
    				<div class="cate">
    				<?php echo OutputOptionItemsOfCategories('');?><br>
    				<input type="text" name="cate_id" id="cate_id"  value="<?php echo $zbp->Config('suiranx_nav')->cate_id;?>" />
    				&nbsp;<a href="javascript:;" id="reset_id">点我清空</a>
    				</div>
			    </div><br/>
			    
            	<div><label>首页每个【导航样式】的调用数量：<input style="width:50px;margin-left:10px;text-align:center;" type="text" name="art_num" value="<?php echo $zbp->Config('suiranx_nav')->art_num;?>" /></label></div>
            	<div><label>首页每个【文章样式】的调用数量：<input style="width:50px;margin-left:10px;text-align:center;margin-top:5px;" type="text" name="art2_num" value="<?php echo $zbp->Config('suiranx_nav')->art2_num;?>" /></label></div>
            	<div><label>首页每个分类下的排序：
            	
            	
            <select name="index_list_order" style="margin-top:5px;">
              <option value="1" <?php if($zbp->Config('suiranx_nav')->index_list_order=="1") echo "selected"; ?>>按浏览量排序</option>
              <option value="2" <?php if($zbp->Config('suiranx_nav')->index_list_order=="2") echo "selected"; ?>>按评论量排序</option>
              <option value="3" <?php if($zbp->Config('suiranx_nav')->index_list_order=="3") echo "selected"; ?>>按时间正序</option>   
              <option value="4" <?php if($zbp->Config('suiranx_nav')->index_list_order=="4") echo "selected"; ?>>按时间倒序(默认)</option>
              </select><span style="padding-left:5px;">默认按时间倒序来排序</span>
              </div>
        	</td>
        	<td><p align="left">首页分类调用id，数量，排序</p><p class="red">首页【导航样式】【文章样式】选择：到分类管理中编辑选择</p></td>
    	</tr>       	
        <tr>
        	<td><p align="center">栏目页文章调用数</p></td>
        	<td>后台【网站设置】> 页面设置 > 列表页显示文章的数量<a target="_blank" href="/zb_system/admin/index.php?act=SettingMng#tab3">&nbsp;&nbsp;点我设置</a></label>
        	</td>
        	<td><p align="left">栏目页文章调用数</p></td>
    	</tr>     	
        <tr style="display:none">
        	<td><p align="center">首页统计数据</p></td>
        	<td><p align="left">是否开启：<input type="text" id="data_switch" name="data_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->data_switch;?>"/></p></td>
        	<td><p align="left">收录量和审核量，浏览量等数据</p></td>
    	</tr>     	
        <tr>
        	<td><p align="center">首页左侧快捷菜单</p></td>
        	<td><p align="left">是否开启：<input type="text" id="fast_nav_switch" name="fast_nav_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->fast_nav_switch;?>"/></p></td>
        	<td><p align="left">首页PC垂直的快捷菜单</p></td>
    	</tr>   
        <tr>
        	<td><p align="center">30天统计开关</p></td>
        	<td><p align="left">是否开启：<input type="text" id="day30_switch" name="day30_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->day30_switch;?>"/></p></td>
        	<td><p align="left">网址详情页30天访问统计开关</p></td>
    	</tr>       	
        <tr>
            <td><label for="nofollow_switch"><p align="center">直达外链添加nofollow</p></label></td>
            <td><p align="left">是否开启：<input type="text" id="nofollow_switch" name="nofollow_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->nofollow_switch;?>"/></p>
            </td>
            <td><p align="left">直达外链添加rel="nofollow"</p></td>
        </tr>    
        <tr>
            <td><label for="go_switch"><p align="center">全站直达</p></label></td>
            <td><p align="left">是否开启：<input type="text" id="go_switch" name="go_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->go_switch;?>"/></p>
            </td>
            <td><p align="left">开启后点任何地方均不会进入详情页，直接跳转</p></td>
        </tr>        
        <tr>
            <td><label for="flink_rule"><p align="center">友情链接</p></label></td>
            <td><p align="left">是否开启：<input type="text" id="flink_switch" name="flink_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->flink_switch;?>"/>&nbsp;&nbsp;<a target="_blank" href="/zb_system/cmd.php?act=ModuleEdt&id=10">点我进入【友链管理】</a></p>
            </td>
            <td><p align="left">调用系统自带的友情链接</p></td>
        </tr>    	    	
        <tr>
            <td><label for="footer_info"><p align="center">底部信息配置</p></label></td>
            <td><p align="left"><textarea name="footer_info" type="text" id="footer_info" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->footer_info;?></textarea></p></td>
            <td><p align="left">底部信息配置</p></td>
        </tr>         
        <tr>
            <td><label for="footer_code"><p align="center">统计代码</p></label></td>
            <td><p align="left"><textarea name="footer_code" type="text" id="footer_code" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->footer_code;?></textarea></p></td>
            <td><p align="left">百度、CNZZ等统计代码</p></td>
        </tr>     	
</table>
<br/>
<input name="" type="Submit" class="button" value="保存"/>   
</form>
<?php }if ($act == 'submit_set') { ?>  
    <form method="post">
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
        <tr>
            <th width="15%"><p align="center">名称</p></th>
            <th width="70%"><p align="center">设置</p></th>
        </tr> 
        <tr>
          <td align="center"><b>收录提示</b></td>
          <td><textarea name="tips" cols="98" rows="1" style="width:98%;vertical-align:middle"><?php echo $zbp->Config('suiranx_nav')->tips; ?></textarea></td>
        </tr>          
        <tr>
          <td width="20%" align="center"><b>【申请收录】入口</b></td>
          <td>指定页面ID：<input type="text" value="<?php echo $zbp->Config('suiranx_nav')->pageid;?>" name="pageid" size="8">
            <span></span><?php $suiranx_navurl=GetPost((int)$zbp->Config('suiranx_nav')->pageid); ?>
            <?php if($suiranx_navurl->ID): ?>
            <a href="<?php echo $suiranx_navurl->Url; ?>" target="_blank"><?php echo $suiranx_navurl->Url; ?></a>
            <?php else: ?>
            <span class="red"></span>
            <?php endif; ?></br>
            <p><label>按钮的名字：<input size="8" type="text" name="btn_name" value="<?php echo $zbp->Config('suiranx_nav')->btn_name;?>" /></label></p>
            是否开启：<input name="submit_switch" type="text" value="<?php echo $zbp->Config('suiranx_nav')->submit_switch;?>" class="checkbox">
          </td>
        </tr>
        <tr>
          <td width="20%" align="center"><b>【所属分类】自定义</b></td>
          <td>
              是否开启：<input name="submit_cate_switch" type="text" value="<?php echo $zbp->Config('suiranx_nav')->submit_cate_switch;?>" class="checkbox"> <span class="red">关闭则调用所有分类</span>
            <p><label>自定义分类id：<input size="30" type="text" name="submit_cate" value="<?php echo $zbp->Config('suiranx_nav')->submit_cate;?>" /></label> 多个分类id之间用英文逗号隔开</p>
            
          </td>
        </tr>        
        <tr>
          <td align="center"><b>提交后跳转网址</b></td>
          <td><input type="text" value="<?php echo $zbp->Config('suiranx_nav')->jump;?>" name="jump" size="48">
            <span>留空则停留在提交页面</span></td>
        </tr>
        <tr>
          <td align="center"><b>编辑器设置</b></td>
          <td><select name="editer">
              <option value="1" <?php if($zbp->Config('suiranx_nav')->editer=="1") echo "selected"; ?>>简洁模式</option>
              <option value="2" <?php if($zbp->Config('suiranx_nav')->editer=="2") echo "selected"; ?>>系统模式</option>
              <option value="3" <?php if($zbp->Config('suiranx_nav')->editer=="3") echo "selected"; ?>>完整模式</option>
            </select>
            <span>zblog程序为安全起见，只允许作者以上的用户才可用编辑器传图，如需游客传图请安装插件<a href="../../plugin/AppCentre/main.php?id=235" target="_blank">角色分配器</a>给游客添加<font style="color:#f00;">UploadPst(上传附件)权限</font></span></td>
        </tr>
        
        <tr>
          <td align="center"><b>免审核设置</b></td>
          <td><select name="pass">
              <option value="1" <?php if($zbp->Config('suiranx_nav')->pass=="1") echo "selected"; ?>><?php echo $zbp->lang['user_level_name'][1];?></option>
              <option value="2" <?php if($zbp->Config('suiranx_nav')->pass=="2") echo "selected"; ?>><?php echo $zbp->lang['user_level_name'][2];?></option>
              <option value="3" <?php if($zbp->Config('suiranx_nav')->pass=="3") echo "selected"; ?>><?php echo $zbp->lang['user_level_name'][3];?></option>
              <option value="4" <?php if($zbp->Config('suiranx_nav')->pass=="4") echo "selected"; ?>><?php echo $zbp->lang['user_level_name'][4];?></option>
              <option value="5" <?php if($zbp->Config('suiranx_nav')->pass=="5") echo "selected"; ?>><?php echo $zbp->lang['user_level_name'][5];?></option>
              <option value="6" <?php if($zbp->Config('suiranx_nav')->pass=="6") echo "selected"; ?>><?php echo $zbp->lang['user_level_name'][6];?></option>
            </select>
            <span>级别以上用户提交收录免审核，提交成功即为公开状态（请慎重选择）</span></td>
        </tr>
        
        <tr>
          <td align="center"><b>开启验证码</b></td>
          <td><input name="scode" type="text" value="<?php echo $zbp->Config('suiranx_nav')->scode;?>" class="checkbox">
            <span>是否开启验证码</span></td>
        </tr>
      </table>
      <br>
      <input type="submit" name="submit" value="保存">
    </form>
<?php }if ($act == 'nav_set') { ?>  
    <form id="form2" name="form2" method="post"> 
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
        <tr>
            <th width="15%"><p align="center">名称</p></th>
            <th width="50%"><p align="center">设置</p></th>
            <th width="25%"><p align="center">说明</p></th>
        </tr> 
        <tr>
        <td><p align="center">导航设置</p></td>
        <td><p align="left">①在<a target="_blank" href="/zb_system/cmd.php?act=CategoryMng">分类管理</a>设置好相关分类，子分类即子菜单，支持多级子分类<br/>②如需下拉菜单请点<a target="_blank" href="/zb_system/cmd.php?act=ModuleEdt&id=4">网站分类</a>把样式改为ul嵌套并提交保存。如未生效请清理缓存<!--，如有疑问<a href="">猛戳这里</a>--></p></td>
        <td><p align="left">设置好后程序自动帮你配置导航</p></td>
        </tr>
        <tr>        
    </table>  
</form>   
<?php }if ($act == 'list_set') { ?>    
    <form id="list_set" name="list_set" method="post">  
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>    
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
            <th width="15%"><p align="center">模板</p></th>
            <th width="50%"><p align="center">设置</p></th>
            <th width="25%"><p align="center">说明</p></th>
        </tr>    
        <tr>
        	<td colspan="3"><p align="left" style="padding-left:20px;"> 总开关：<input type="text" id="list_type_switch" name="list_type_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->list_type_switch;?>"/></p><p align="left" style="padding-left:20px;">默认列表为导航格子，可以点选你要的分类作为文章列表样式</p></td>
    	</tr>
    	
        <tr>
        	<td><p align="center">文章列表样式</p></td>
        	<td>
        	    <div class="select-cate">
				    <span>点击选择分类:</span>
    				<div class="cate2">
    				<?php echo OutputOptionItemsOfCategories('');?><br>
    				<input type="text" name="cate_id2" id="cate_id2"  value="<?php echo $zbp->Config('suiranx_nav')->cate_id2;?>" />
    				&nbsp;<a href="javascript:;" id="reset_id2">点我清空</a>
    				</div>
			    </div>
        	</td>
        	<td><p align="center">点击指定的分类添加该列表样式</p></td>
    	</tr>
    	<!--
    	<tr>
            <td><p align="center">列表页排序</p></td>
            <td><select name="nav_list_order">
              <option value="1" <?php if($zbp->Config('suiranx_nav')->nav_list_order=="1") echo "selected"; ?>>按浏览量排序</option>
              <option value="2" <?php if($zbp->Config('suiranx_nav')->nav_list_order=="2") echo "selected"; ?>>按评论量排序</option>
              <option value="3" <?php if($zbp->Config('suiranx_nav')->nav_list_order=="3") echo "selected"; ?>>按时间正序</option>   
              <option value="4" <?php if($zbp->Config('suiranx_nav')->nav_list_order=="4") echo "selected"; ?>>按时间倒序(默认)</option>
              </select>
              <span>默认按时间倒序来排序</span>
            </td>            
    	    <td><p align="center">列表页排序，默认按时间倒序来排序</p></td>  
    	</tr>-->
    </table>
    <br/>
    <input name="" type="Submit" class="button" value="保存"/>
    </form>
<?php }if ($act == 'seo_set') { ?>  
    <form id="form3" name="form3" method="post"> 
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
        <tr>
            <th width="15%"><p align="center">名称</p></th>
            <th width="50%"><p align="center">设置</p></th>
            <th width="25%"><p align="center">说明</p></th>
        </tr>  
        <tr>
            <td><label for="seo_switch"><p align="center">SEO功能总开关</p></label></td>
            <td><p align="left"><input type="text" id="seo_switch" name="seo_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->seo_switch;?>"/></p></td>
            <td><p align="left">开启后以下功能才能生效</p></td>
        </tr>    
        
        <tr>
            <td><label for="index_title"><p align="center">首页标题</p></label></td>
            <td><p align="left"><textarea name="index_title" type="text" id="index_title" rows="2" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->index_title;?></textarea></p></td>
            <td><p align="left">填写网站首页标题</p></td>
        </tr> 
       
        <tr>
            <td><label for="index_keywords"><p align="center">首页关键词</p></label></td>
            <td><p align="left"><textarea name="index_keywords" type="text" id="index_keywords" rows="2" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->index_keywords;?></textarea></p></td>
            <td><p align="left">填写网站首页关键词，多个英文逗号隔开</p></td>
        </tr>
        <tr>
             <td><label for="description"><p align="center">首页描述</p></label></td>
            <td><p align="left"><textarea name="index_description" type="text" id="index_description" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->index_description;?></textarea></p></td>
            <td><p align="left">填写网站首页描述</p></td>
        </tr>          
        <tr>
            <td><label><p align="center">其它SEO</p></label></td>
            <td colspan="2">
                <p align="left">温馨提示：本主题内置了文章页SEO、分类页SEO、标签页SEO、页面SEO的功能！到具体文章编辑、分类编辑、标签编辑、页面编辑设置即可！</p>
            </td>
        </tr>                 
    </table>
<br/>
<input name="" type="Submit" class="button" value="保存"/>  
</form> 
<?php }if ($act == 'slider_set') { ?>
    <form id="slider_set" name="slider_set" method="post">
        <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>  
        
        <table width="100%" style="padding:0;margin:0;" cellspacing='0' cellpadding='0' class="tableBorder">
            <th width="100%"><p align="center" style="float:left;margin-left:14px;">首页熊动画的总开关<input type="text" name="bear_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->bear_switch;?>"/></p></th>
        </table>        
        <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
        <tr>
            <th width="10%"><p align="center">名称</p></th>
            <th width="58%"><p align="center">设置</p></th>
            <th width="30%"><p align="center">说明</p></th>
        </tr>   
        <tr>
        	<td><p align="center">首页动画banner上的标语</p></td>
        	<td><label><input style="width:98%;" type="text" name="slogan" value="<?php echo $zbp->Config('suiranx_nav')->slogan;?>" /></label>
        	</td>
        	<td><p align="left">留空则不显示</p></td>
    	</tr>  
        <tr>
        	<td><p align="center">首页自定义搜索</p></td>
        	<td>
                <p align="left">是否开启：<input type="text" name="search_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->search_switch;?>"/></p>     	    
        	    <p>①网站名：<input style="width:10%;" type="text" name="search_name_1" value="<?php echo $zbp->Config('suiranx_nav')->search_name_1;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_1" value="<?php echo $zbp->Config('suiranx_nav')->search_url_1;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_1" value="<?php echo $zbp->Config('suiranx_nav')->name_1;?>"/></p>
        	    <p>②网站名：<input style="width:10%;" type="text" name="search_name_2" value="<?php echo $zbp->Config('suiranx_nav')->search_name_2;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_2" value="<?php echo $zbp->Config('suiranx_nav')->search_url_2;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_2" value="<?php echo $zbp->Config('suiranx_nav')->name_2;?>"/></p>   
        	    <p>③网站名：<input style="width:10%;" type="text" name="search_name_3" value="<?php echo $zbp->Config('suiranx_nav')->search_name_3;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_3" value="<?php echo $zbp->Config('suiranx_nav')->search_url_3;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_3" value="<?php echo $zbp->Config('suiranx_nav')->name_3;?>"/></p>  
        	    <p>④网站名：<input style="width:10%;" type="text" name="search_name_4" value="<?php echo $zbp->Config('suiranx_nav')->search_name_4;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_4" value="<?php echo $zbp->Config('suiranx_nav')->search_url_4;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_4" value="<?php echo $zbp->Config('suiranx_nav')->name_4;?>"/></p>  
        	    <p>⑤网站名：<input style="width:10%;" type="text" name="search_name_5" value="<?php echo $zbp->Config('suiranx_nav')->search_name_5;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_5" value="<?php echo $zbp->Config('suiranx_nav')->search_url_5;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_5" value="<?php echo $zbp->Config('suiranx_nav')->name_5;?>"/></p>  
        	    <p>⑥网站名：<input style="width:10%;" type="text" name="search_name_6" value="<?php echo $zbp->Config('suiranx_nav')->search_name_6;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_6" value="<?php echo $zbp->Config('suiranx_nav')->search_url_6;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_6" value="<?php echo $zbp->Config('suiranx_nav')->name_6;?>"/></p> 
        	    <p>⑦网站名：<input style="width:10%;" type="text" name="search_name_7" value="<?php echo $zbp->Config('suiranx_nav')->search_name_7;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_7" value="<?php echo $zbp->Config('suiranx_nav')->search_url_7;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_7" value="<?php echo $zbp->Config('suiranx_nav')->name_7;?>"/></p>   
        	    <p>⑧网站名：<input style="width:10%;" type="text" name="search_name_8" value="<?php echo $zbp->Config('suiranx_nav')->search_name_8;?>"/>
        	action跳转：<input style="width:40%;" type="text" name="search_url_8" value="<?php echo $zbp->Config('suiranx_nav')->search_url_8;?>"/>
        	name属性：<input style="width:10%;" type="text" name="name_8" value="<?php echo $zbp->Config('suiranx_nav')->name_8;?>"/>
        	</p>        	
        	</td>
        	<td><p align="left">
        	<span style="color:red">网站名：站内<br>action跳转：http(s)://www.xxx.com/search.php<br>name属性：q</span><br><br>
        	网站名：百度<br>action跳转：https://www.baidu.com/s?wd=<br>name属性：wd<br><br>
        	网站名：淘宝<br>action跳转：https://s.taobao.com/search?q=<br>name属性：q<br><br>
        	问：如何获取某个网站搜索的action地址和name属性？<br>
        	答：只需要在该网站搜个中文词，打开的url里复制中文词前面的地址即可，该地址问号后面的词一般就是name属性</td>
    	</tr>      	
        </table>
        <br/>
        <br/>
        
        <table width="100%" style="padding:0;margin:0;" cellspacing='0' cellpadding='0' class="tableBorder">
            <th width="100%"><p align="center" style="float:left;margin-left:14px;">首页幻灯片总开关<input type="text" name="slider_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->slider_switch;?>"/></p></th>
        </table>
        <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
            <tr>
                <th width="5%"><p align="center">序号</p></th>
                <th width="5%"><p align="center">开关</p></th>
                <th width="25%"><p align="center">幻灯片标题</p></th>
                <th width="35%"><p align="center">图片地址</p></th>
                <th width="25%"><p align="center">跳转链接</p></th>
            </tr>         	
            <tr>    					       	 	  	     						 	
                <td><p align="center">1</p></td>  
            	<td><p align="left"><input type="text" id="slider1_switch" name="slider1_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->slider1_switch;?>"/></p></td>		     	       				         		  
                <td><input type="text" style="width:100%" name="slider_title1" value="<?php echo $zbp->Config('suiranx_nav')->slider_title1;?>"></td>
                <td><div class="uploadimg"><input type="text" style="width:70%"  class="uplod_img" name="slider_img1" value="<?php echo $zbp->Config('suiranx_nav')->slider_img1;?>"><strong>上传图片</strong></div></td>
                <td><input type="text" style="width:100%"  name="slider_url1" value="<?php echo $zbp->Config('suiranx_nav')->slider_url1;?>"></td>	
            </tr>
            <tr>    					       	 	  	     						 	
                <td><p align="center">2</p></td>  
            	<td><p align="left"><input type="text" id="slider2_switch" name="slider2_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->slider2_switch;?>"/></p></td>
                <td><input type="text" style="width:100%" name="slider_title2" value="<?php echo $zbp->Config('suiranx_nav')->slider_title2;?>"></td>		                <td><div class="uploadimg"><input type="text" style="width:70%"  class="uplod_img" name="slider_img2" value="<?php echo $zbp->Config('suiranx_nav')->slider_img2;?>"><strong>上传图片</strong></div></td>
                <td><input type="text" style="width:100%"  name="slider_url2" value="<?php echo $zbp->Config('suiranx_nav')->slider_url2;?>"></td>	
            </tr>  
            <tr>    					       	 	  	     						 	
                <td><p align="center">3</p></td>  
            	<td><p align="left"><input type="text" id="slider3_switch" name="slider3_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->slider3_switch;?>"/></p></td>		     	       				         		  
                <td><input type="text" style="width:100%" name="slider_title3" value="<?php echo $zbp->Config('suiranx_nav')->slider_title3;?>"></td>		                <td><div class="uploadimg"><input type="text" style="width:70%"  class="uplod_img" name="slider_img3" value="<?php echo $zbp->Config('suiranx_nav')->slider_img3;?>"><strong>上传图片</strong></div></td>
                <td><input type="text" style="width:100%"  name="slider_url3" value="<?php echo $zbp->Config('suiranx_nav')->slider_url3;?>"></td>	
            </tr>
            <tr>    					       	 	  	     						 	
                <td><p align="center">4</p></td>  
            	<td><p align="left"><input type="text" id="slider4_switch" name="slider4_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->slider4_switch;?>"/></p></td>		     	       				         		  
                <td><input type="text" style="width:100%" name="slider_title4" value="<?php echo $zbp->Config('suiranx_nav')->slider_title4;?>"></td>		                <td><div class="uploadimg"><input type="text" style="width:70%"  class="uplod_img" name="slider_img4" value="<?php echo $zbp->Config('suiranx_nav')->slider_img4;?>"><strong>上传图片</strong></div></td>
                <td><input type="text" style="width:100%"  name="slider_url4" value="<?php echo $zbp->Config('suiranx_nav')->slider_url4;?>"></td>	
            </tr>
            <tr>    					       	 	  	     						 	
                <td><p align="center">5</p></td>  
            	<td><p align="left"><input type="text" id="slider5_switch" name="slider5_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->slider5_switch;?>"/></p></td>		     	       				         		  
                <td><input type="text" style="width:100%" name="slider_title5" value="<?php echo $zbp->Config('suiranx_nav')->slider_title5;?>"></td>		                <td><div class="uploadimg"><input type="text" style="width:70%"  class="uplod_img" name="slider_img5" value="<?php echo $zbp->Config('suiranx_nav')->slider_img5;?>"><strong>上传图片</strong></div></td>
                <td><input type="text" style="width:100%"  name="slider_url5" value="<?php echo $zbp->Config('suiranx_nav')->slider_url5;?>"></td>	
            </tr>             
        </table>	
        <br/>
        <input name="" type="Submit" class="button" value="保存"/>  
        <br/>
    </form> 
<?php }if ($act == 'ad_set') { ?>    
    <form id="form4" name="form4" method="post">  
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>    
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
            <th width="15%"><p align="center">编号</p></th>
            <th width="50%"><p align="center">广告代码</p></th>
            <th width="5%"><p align="center">开关</p></th>
            <th width="25%"><p align="center">说明</p></th>
        </tr>      
        <tr>
            <td><label for="ad1"><p align="center"><span class="red">AD1</span><br/>首页动画banner下方广告位</p></label></td>
            <td><p align="left">电脑端：<br/><textarea name="ad1" type="text" id="ad1" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->ad1;?></textarea><br/>移动端：<br/><textarea name="m_ad1" type="text" id="m_ad1" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->m_ad1;?></textarea></p></td>
            <td><p align="center"><input type="text" id="ad1_switch" name="ad1_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->ad1_switch;?>" /></p></td>
            <td><p align="left">首页动画banner下方广告位</p></td>
        </tr>
        <tr>
            <td><label for="ad2"><p align="center"><span class="red">AD2</span><br/>文章页信息右侧</p></label></td>
            <td><p align="left">电脑端：<br/><textarea name="ad2" type="text" id="ad2" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->ad2;?></textarea><br/>移动端：<br/><textarea name="m_ad2" type="text" id="m_ad2" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->m_ad2;?></textarea></p></td>
            <td><p align="center"><input type="text" id="ad2_switch" name="ad2_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->ad2_switch;?>" /></p></td>
            <td><p align="left">文章页信息右侧</p></td>
        </tr>
        <tr>
            <td><label for="ad3"><p align="center"><span class="red">AD3</span><br/>文章结尾广告位</p></label></td>
            <td><p align="left">电脑端：<br/><textarea name="ad3" type="text" id="ad3" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->ad3;?></textarea><br/>移动端：<br/><textarea name="m_ad3" type="text" id="m_ad3" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->m_ad3;?></textarea></p></td>
            <td><p align="center"><input type="text" id="ad3_switch" name="ad3_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->ad3_switch;?>" /></p></td>
            <td><p align="left">文章结尾广告位</p></td>
        </tr>
        <tr>
            <td><label for="ad4"><p align="center"><span class="red">AD4</span><br/>栏目页顶部广告位</p></label></td>
            <td><p align="left">电脑端：<br/><textarea name="ad4" type="text" id="ad4" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->ad4;?></textarea><br/>移动端：<br/><textarea name="m_ad4" type="text" id="m_ad4" rows="4" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->m_ad4;?></textarea></p></td>
            <td><p align="center"><input type="text" id="ad4_switch" name="ad4_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->ad4_switch;?>" /></p></td>
            <td><p align="left">栏目页顶部广告位</p></td>
        </tr>          
    </table>
    <br />
    <input name="" type="Submit" class="button" value="保存"/>
    </form> 
<?php }if ($act == 'other') { ?>    
	<form id="form6" name="form6" method="post">
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>	    	
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
        <tr>
            <th width="15%"><p align="center">名称</p></th>
            <th width="50%"><p align="center">设置</p></th>
            <th width="25%"><p align="center">说明</p></th>
        </tr>	    
        <tr>
            <td><label for="qq_card_switch"><p align="center">自定义QQ里发网址显示的内容</p></label></td>                 
        	<td><p align="left"><input type="text" name="qq_card_switch" class="checkbox" value="<?php echo $zbp->Config('suiranx_nav')->qq_card_switch;?>"/>&nbsp;&nbsp;</p>
        	    <p><textarea name="qq_card" type="text" id="qq_card" rows="5" style="width:98%;"><?php echo $zbp->Config('suiranx_nav')->qq_card;?></textarea></p>
        	    <p>复制下面代码，替换中文内容即可</p>
<p>&lt;meta itemprop=&quot;name&quot; content=&quot;网站标题&quot;/&gt;&#13;</p>
<p>&lt;meta itemprop=&quot;image&quot; content=&quot;网站要显示的图片链接&quot; /&gt;</p>
<p>&lt;meta name=&quot;description&quot; itemprop=&quot;description&quot; content=&quot;网站内容&quot; /&gt;</p>
                </p>
            </td>        	
        	
            <td><p align="center"><img src="<?php echo $zbp->host.'zb_users/theme/suiranx_nav/image/demo.png'?>" width="200"></p></td>
        </tr>  	
	</table>

	<br/>
    <input name="" type="Submit" class="button" style="margin-top:10px;padding:0 auto;" value="保存"/>
	</form>        
<?php }if ($act == 'my_css') { ?>    
	<form id="form6" name="form6" method="post">
    <?php if (function_exists('CheckIsRefererValid')) {echo '<input type="hidden" name="csrfToken" value="' . $zbp->GetCSRFToken() . '">';}?>	    	
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<tr>
        <th width="100%">写自己的css轻松打造自己喜欢的风格，此处样式可以覆盖主题的样式</th>
	</tr>
	<tr>
        <td>
        <p><textarea name="diy_css" type="text" id="diy_css" rows="30" style="width:100%;"><?php echo $zbp->Config('suiranx_nav')->diy_css;?></textarea></p>        
        </td>
	</tr>	
	</table>

	<br/>
    <input name="" type="Submit" class="button" style="margin-top:10px;padding:0 auto;" value="保存"/>
	</form>
<?php }?>
  </div>
</div>
<script type="text/javascript">
ActiveTopMenu("topmenu_suiranx_nav");
AddHeaderIcon("<?php echo $zbp->host?>zb_system/image/common/themes_32.png");
$('#bgpicker').colpick({
    layout:'hex',
    submit:0,
    onChange:function(hsb,hex,rgb,el,bySetColor) {
        $(el).css('border-color','#'+hex);
        if(!bySetColor) $(el).val(hex);
    }
}).keyup(function(){
    $(this).colpickSetColor(this.value);
});

$('.color-box').click(function() {
        var c = $(this).data('color');
        $('#bgpicker').colpickSetColor(c);
        $('#bgpicker').val(c );
        $('#bgpicker').css('border-color', '#'+c); 
});
</script> 
<!--后台分类选择id的js-->
<script type="text/javascript">
	var a_name = 0;
    $(".select-cate .cate option").click(function(){
        var fid = $(this).attr("value");
        var sid = $("#cate_id").val();
        if((a_name == 0 && sid == "") || sid == ""){
            $("#cate_id").val(sid+fid);
        }else{
            $("#cate_id").val(sid+","+fid);
        }
        a_name = 1;
    });
    $("#reset_id").click(function(){
        $("#cate_id").val("");
 	});      
</script> 
<script type="text/javascript">
	var a_name = 0;
    $(".select-cate .cate2 option").click(function(){
        var fid = $(this).attr("value");
        var sid = $("#cate_id2").val();
        if((a_name == 0 && sid == "") || sid == ""){
            $("#cate_id2").val(sid+fid);
        }else{
            $("#cate_id2").val(sid+","+fid);
        }
        a_name = 1;
    });
    $("#reset_id2").click(function(){
        $("#cate_id2").val("");
 	});      
</script> 
<script type="text/javascript">
    var editor = new baidu.editor.ui.Editor({ toolbars:[['Paragraph','FontFamily','FontSize','Bold','Italic','ForeColor', "backcolor", "link",'justifyleft','justifycenter','justifyright','source']],initialFrameHeight:50 });
    editor.render("myEditor");
</script>
<?php
if ($zbp->CheckPlugin('UEditor')) {	       	 		  	    					  	       	   	    		 	  	 
	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.config.php"></script>';    			  	echo '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/UEditor/ueditor.all.min.js"></script>';	  	     		echo "<script type=\"text/javascript\" src=\"assets/lib.upload.js\"></script>";	    	  		 	      		 				    	  		  	    			  	 	
}     		              			     	 	 		 	    	 			 		
require $blogpath . 'zb_system/admin/admin_footer.php';    	 	 				    				 		     	    	 	    		 		  	
RunTime();     						      	  				    		  		      				 		 
?>
