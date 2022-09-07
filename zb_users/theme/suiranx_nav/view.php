<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */        	    		 
$table['ViewInfo'] = '%pre%ViewInfo';   //定义数据表名       	 	 	     	   			
$datainfo['ViewInfo'] =array(    	 	   	       	 	 		
    'ViewID'=>array('ViewID','integer','',0),     	  				      	  			
    'ArtID'=>array('ArtID','integer','',0),    	 	  	         	 		 
    'ViewTime'=>array('ViewTime','string',20,''),      	 				     			    
    'ViewIP'=>array('ViewIP','string',50,''),    	 		   	        		 	
  );       			  		
function suiranx_nav_create_database() {     	 	 			        	 	 
    global $zbp;      	 		 	       				 
    if (!$zbp->db->ExistTable($GLOBALS['table']['ViewInfo'])) {    	   	  	     	  	 	 
        $s = $zbp->db->sql->CreateTable($GLOBALS['table']['ViewInfo'], $GLOBALS['datainfo']['ViewInfo']);    		 			      	 			 		
        $zbp->db->QueryMulit($s);      		 		     		 		 	 
    }     	   	 	    		  				
}    	    	      	 			   
function suiranx_nav_views($postid) {    	 				       	      
    global $zbp;     			   	     	 	 	  
    $time = time();    			 		 	    			 	 		
    $ip = GetGuestIP();       	 		       		 		 
    $array = array('ViewTime' => $time, 'ArtID' => $postid, 'ViewIP' => $ip);      	  		     	  					
    $sql = $zbp->db->sql->Insert($zbp->table['ViewInfo'], $array);    		           	 		 	 
    $zbp->db->Insert($sql);      	  	        	 					 
}      			 	  
     		 		  
     	 	    
      	     
function suiranx_nav_views1($postid) {     	 	  		    	 	  	 	
    global $zbp;           		  				
  $datetime=mktime(0,0,0,date('m'),date('d')-29,date('Y'));    	  	 	      		 			  
  $datetimeb=mktime(0,0,0,date('m'),date('d')-28,date('Y'))-1;    	 	    	    		      
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     		 		 	    								
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');    	                	 	
 return $num;      		   		      	 	  	
}    	   		       				   
function suiranx_nav_views2($postid) {    	 	  			        				
    global $zbp;    	 		  		    	 			  	
  $datetime=mktime(0,0,0,date('m'),date('d')-28,date('Y'));      	 		      	    	  
  $datetimeb=mktime(0,0,0,date('m'),date('d')-27,date('Y'))-1;    	 	 		            	 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));    	 		 			     	 	 			
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');       	 	 	      	   		
 return $num;     	 	  	 	    	   		  
}      		 		     					   
function suiranx_nav_views3($postid) {     	   	      		 		   
    global $zbp;      			 	     	 			   
  $datetime=mktime(0,0,0,date('m'),date('d')-27,date('Y'));      	 	       			 	 		
  $datetimeb=mktime(0,0,0,date('m'),date('d')-26,date('Y'))-1;    			   	       		  	 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));    	 	  	 	      	 				
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');    	  				       		   	
 return $num;     		    		    	 	 			 
}    		 	 		      	 			 	
function suiranx_nav_views4($postid) {    		  		 	        		 	
    global $zbp;    	  				     			   		
  $datetime=mktime(0,0,0,date('m'),date('d')-26,date('Y'));       		        	 		   
  $datetimeb=mktime(0,0,0,date('m'),date('d')-25,date('Y'))-1;    							       				 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));         	 	         		 
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');    	 		 	      		    	 
 return $num;     			 	          	 	  
}    	 	  	 	         	  
function suiranx_nav_views5($postid) {      	         	       
    global $zbp;     	    	       			 		
  $datetime=mktime(0,0,0,date('m'),date('d')-25,date('Y'));     		  			    	  		  	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-24,date('Y'))-1;     	 				     			   		
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	 		  	     	   			
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');    	 		 			     			 	 	
 return $num;        	 	 	    	 	  	  
}     			 	 	    	  	 	 	
function suiranx_nav_views6($postid) {    		     	     	   		 
    global $zbp;                	  				 
  $datetime=mktime(0,0,0,date('m'),date('d')-24,date('Y'));    	   	 		      			   
  $datetimeb=mktime(0,0,0,date('m'),date('d')-23,date('Y'))-1;         			     	  		 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	         	 	  	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    	  		 		
 return $num;     			 		      				  		
}    		  	  	    			  	  
function suiranx_nav_views7($postid) {    		 				      	  	   
    global $zbp;                	 	 	   
  $datetime=mktime(0,0,0,date('m'),date('d')-23,date('Y'));    	   	 		    	   		  
  $datetimeb=mktime(0,0,0,date('m'),date('d')-22,date('Y'))-1;         			    	     	 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	    			
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    	 				 	
 return $num;      					 	     		  	 	
}      	 		 	 
function suiranx_nav_views8($postid) {    		 				         	   
    global $zbp;                					   
  $datetime=mktime(0,0,0,date('m'),date('d')-22,date('Y'));    	   	 		    	 	  			
  $datetimeb=mktime(0,0,0,date('m'),date('d')-21,date('Y'))-1;         			       	 	  
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	        	   			
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				     			   	
 return $num;      					 	    								
}     	 			 		
function suiranx_nav_views9($postid) {    		 				     	  			  
    global $zbp;                	 		    
  $datetime=mktime(0,0,0,date('m'),date('d')-21,date('Y'));    	   	 		    			  	 	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-20,date('Y'))-1;         			       			 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	   				
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    		   			
 return $num;     					 	    	  	 		 
}     			  		 
function suiranx_nav_views10($postid) {    		 				      			    
    global $zbp;                					 		
  $datetime=mktime(0,0,0,date('m'),date('d')-20,date('Y'));    	   	 		    			 				
  $datetimeb=mktime(0,0,0,date('m'),date('d')-19,date('Y'))-1;         			        		 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	        	 		  	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				     	  	   
 return $num;     					 	    			 	  	
}     	   		  
function suiranx_nav_views11($postid) {    		 				          		 
    global $zbp;                  	  	 	
  $datetime=mktime(0,0,0,date('m'),date('d')-19,date('Y'));    	   	 		    	 	 	  	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-18,date('Y'))-1;         			     	 			 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	        		 		 	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				     	 		  	
 return $num;     					 	     		   		
}    	 	 	 	 
function suiranx_nav_views12($postid) {    		 				     				  		
    global $zbp;                		 	 			
  $datetime=mktime(0,0,0,date('m'),date('d')-18,date('Y'));    	   	 		    	 		 			
  $datetimeb=mktime(0,0,0,date('m'),date('d')-17,date('Y'))-1;         			    	 		    
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	         		 	 	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				     				  	
 return $num;     					 	     							
}     		   	 
function suiranx_nav_views13($postid) {    		 				     		 	  		
    global $zbp;                 				  	
  $datetime=mktime(0,0,0,date('m'),date('d')-17,date('Y'));    	   	 		    	  	   	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-16,date('Y'))-1;         			    			 		 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	        		 	  	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				       	   	
 return $num;     					 	    		 		 	 
}      	   		
function suiranx_nav_views14($postid) {    		 				      		 	 		
    global $zbp;                  	   	 
  $datetime=mktime(0,0,0,date('m'),date('d')-16,date('Y'));    	   	 		     	 		  	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-15,date('Y'))-1;         			         			
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	        	 		 	 
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				     			 			
 return $num;     					 	    	 		 		 
}    	 				 	
function suiranx_nav_views15($postid) {    		 				       	 	 		
    global $zbp;                	  	 		 
  $datetime=mktime(0,0,0,date('m'),date('d')-15,date('Y'));    	   	 		     						 
  $datetimeb=mktime(0,0,0,date('m'),date('d')-14,date('Y'))-1;         			    			  			
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       				    
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				     						 
 return $num;     					 	      	 		 	
}    	  		   
function suiranx_nav_views16($postid) {    		 				     		 	 		 
    global $zbp;                							 
  $datetime=mktime(0,0,0,date('m'),date('d')-14,date('Y'));    	   	 		    						  
  $datetimeb=mktime(0,0,0,date('m'),date('d')-13,date('Y'))-1;         			      	 	  	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	 	  			
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				      				 	
 return $num;     					 	      			 		
}    		      
function suiranx_nav_views17($postid) {    		 				        			 	
    global $zbp;                	   			 
  $datetime=mktime(0,0,0,date('m'),date('d')-13,date('Y'));    	   	 		      	   		
  $datetimeb=mktime(0,0,0,date('m'),date('d')-12,date('Y'))-1;         			       		   
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       		 	 	 	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    		  	   
 return $num;     					 	     		   	 
}     	     	
function suiranx_nav_views18($postid) {    		 				     		    	 
    global $zbp;                  	 		 	
  $datetime=mktime(0,0,0,date('m'),date('d')-12,date('Y'));    	   	 		    		     	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-11,date('Y'))-1;         			    				 	 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	 		 			
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    	   		 	
 return $num;     					 	    				  		
}    		 	 			
function suiranx_nav_views19($postid) {    		 				     		 				 
    global $zbp;                 	 	 			
  $datetime=mktime(0,0,0,date('m'),date('d')-11,date('Y'));    	   	 		    		  				
  $datetimeb=mktime(0,0,0,date('m'),date('d')-10,date('Y'))-1;         			     	  	 	 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	               
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				          		
 return $num;     					 	    	  		  	
}    								
function suiranx_nav_views20($postid) {    		 				      	  		 	
    global $zbp;                	 	  	  
  $datetime=mktime(0,0,0,date('m'),date('d')-10,date('Y'));    	   	 		      	    	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-9,date('Y'))-1;         			    	 		 	 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	         	  	  
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				      	 	   
 return $num;     					 	       			  
}      	 	 	 
function suiranx_nav_views21($postid) {    		 				     	 	 		  
    global $zbp;                 	   	 	
  $datetime=mktime(0,0,0,date('m'),date('d')-9,date('Y'));    	   	 		    				    
  $datetimeb=mktime(0,0,0,date('m'),date('d')-8,date('Y'))-1;         			    	    		 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	 			   
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				       	 			
 return $num;     					 	     		 	 		
}      	  		 
function suiranx_nav_views22($postid) {    		 				      		  	 	
    global $zbp;                  			   
  $datetime=mktime(0,0,0,date('m'),date('d')-8,date('Y'));    	   	 		     	  	  	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-7,date('Y'))-1;         			    	 	   	 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       			 	 	 
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				        		  
 return $num;     					 	    	 	   		
}     	  	  	
function suiranx_nav_views23($postid) {    		 				      	  	   
    global $zbp;                	  		 		
  $datetime=mktime(0,0,0,date('m'),date('d')-7,date('Y'));    	   	 		     	  			 
  $datetimeb=mktime(0,0,0,date('m'),date('d')-6,date('Y'))-1;         			    		  	   
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	    	 	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    	 	  			
 return $num;     					 	     	   		 
}    	  		 	 
function suiranx_nav_views24($postid) {    		 				      				   
    global $zbp;                		  	 		
  $datetime=mktime(0,0,0,date('m'),date('d')-6,date('Y'));    	   	 		       			 	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-5,date('Y'))-1;         			     	 	  		
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	  	 	 	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    	  	  		
 return $num;     					 	    	  		  	
}     		 				
function suiranx_nav_views25($postid) {    		 				      		 				
    global $zbp;                   	  		
  $datetime=mktime(0,0,0,date('m'),date('d')-5,date('Y'));    	   	 		    	  			  
  $datetimeb=mktime(0,0,0,date('m'),date('d')-4,date('Y'))-1;         			    					   
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	            	  
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    	    	 	
 return $num;     					 	    	 		  	 
}    				 		 
function suiranx_nav_views26($postid) {    		 				     		 					
    global $zbp;                			 	   
  $datetime=mktime(0,0,0,date('m'),date('d')-4,date('Y'));    	   	 		    	   	  	
  $datetimeb=mktime(0,0,0,date('m'),date('d')-3,date('Y'))-1;         			    	 				 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       			    	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				      					 
 return $num;     					 	    					   
}    		  			 
function suiranx_nav_views27($postid) {    		 				     	 		    
    global $zbp;                	 	 			 
  $datetime=mktime(0,0,0,date('m'),date('d')-3,date('Y'));    	   	 		    	 		 		 
  $datetimeb=mktime(0,0,0,date('m'),date('d')-2,date('Y'))-1;         			    			  	 	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       				 	 	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    		  		  
 return $num;     					 	    	 		 			
}    	 					 
function suiranx_nav_views28($postid) {    		 				     	 	  		 
    global $zbp;                   	   	
  $datetime=mktime(0,0,0,date('m'),date('d')-2,date('Y'));    	   	 		    	       
  $datetimeb=mktime(0,0,0,date('m'),date('d')-1,date('Y'))-1;         			    				 			
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	            	  
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    	   	 	 
 return $num;     					 	    			 	   
}       	 	 	
function suiranx_nav_views29($postid) {    		 				       		 			
    global $zbp;                 		 				
  $datetime=mktime(0,0,0,date('m'),date('d')-1,date('Y'));    	   	 		    	  	 			
  $datetimeb=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;         			           	
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('BETWEEN', 'ViewTime', $datetime, $datetimeb)));     	  	       	 			  	
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	 				    				    
 return $num;     					 	    	 	 	  	
}    	  		 		
function suiranx_nav_views30($postid) {    		 				       	   		
    global $zbp;    				  	     		   	 	
  $settime = strtotime(date('Y-m-d',time()));    					 		    	  		 	 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('=', 'ArtID', $postid), array('>', 'ViewTime', $settime)));    	   	  	     	  	 	 
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');     			 		     								
 return $num;      					 	    	 		 			
}     	   		 	
     	   	 	
function suiranx_nav_date1()    	 			  	    			  	  
    {    			 	 		    	 	  		 
        $date = date("m-d",strtotime("-29 day"));      	   		    		 	  	 
        return $date;     	   	 	       	    
 }      	  	 	    		  		  
 function suiranx_nav_date2()      	    	     	   	 	
    {    	   		 	     	  	 	 
        $date = date("m-d",strtotime("-28 day"));      	  	      	  	 		 
        return $date;    		  		       				 	 
 }    			   	       		  		
 function suiranx_nav_date3()     		  	 	     			   	
    {    		    	      	   		 
        $date = date("m-d",strtotime("-27 day"));    							     	 						
        return $date;      				 	         			
 }        			      			 	  
 function suiranx_nav_date4()         	 	    	 	 	 	 
    {     							        	  	
       $date = date("m-d",strtotime("-26 day"));          	     		 					
        return $date;    	 	  	 	     				 	 
 }    	 		 	 	    	 	  	  
 function suiranx_nav_date5()    	    	 	    			 		  
    {     	  	 		    	   			 
        $date = date("m-d",strtotime("-25 day"));      				         	 		 
        return $date;     	 	   	       					
 }    							     	      	
 function suiranx_nav_date6()    		 	   	    					 		
    {    	  	 	      	  			  
        $date = date("m-d",strtotime("-24 day"));    							     	 	   	 
        return $date;    		   			      		 	 	
 }         	   	 
 function suiranx_nav_date7()    		 	   	     	 	  		
    {    	  	 	      		  				
        $date = date("m-d",strtotime("-23 day"));    							        				 
        return $date;    		   			     	  				
 }      		   	 	
 function suiranx_nav_date8()    		 	   	      	 		 	
    {    	  	 	          		 	
        $date = date("m-d",strtotime("-22 day"));    							      	    	 
        return $date;    		   			      	 		 	
 }     		 					
 function suiranx_nav_date9()    		 	   	    				 	  
    {    	  	 	        			  	
        $date = date("m-d",strtotime("-21 day"));    							     	 	  	 	
        return $date;    		   			     	  	 	 
 }       		 			 
 function suiranx_nav_date10()    	   		 	    	 			   
    {      		 	        		 	  
        $date = date("m-d",strtotime("-20 day"));      	 	  		    	 	   	 
        return $date;    		   	      	 	 		 	
 }      			 	 	
  function suiranx_nav_date11()    		 	   	    	   		  
    {    	  	 	         	 			
        $date = date("m-d",strtotime("-19 day"));    							         			 
        return $date;    		   			      	  		 
 }    			 	 		
  function suiranx_nav_date12()    		 	   	    	 	   	 
    {    	  	 	       			 	 	
        $date = date("m-d",strtotime("-18 day"));    							     			  			
        return $date;    		   			      		 			
 }    	  	  	 
  function suiranx_nav_date13()    		 	   	     							
    {    	  	 	      		     	
        $date = date("m-d",strtotime("-17 day"));    							       	 		  
        return $date;    		   			    		 			  
 }    	 	  	 	
  function suiranx_nav_date14()    		 	   	    	 						
    {    	  	 	       	  	 		
        $date = date("m-d",strtotime("-16 day"));    							     	 	 		 	
        return $date;    		   			    	   	  	
 }      		 			
  function suiranx_nav_date15()    		 	   	    	 	  			
    {    	  	 	      		 		  	
        $date = date("m-d",strtotime("-15 day"));    							           	 
        return $date;    		   			      	 	  	
 }         		   		
  function suiranx_nav_date16()    		 	   	     	     	
    {    	  	 	         		 		
        $date = date("m-d",strtotime("-14 day"));    							      						 
        return $date;    		   			    				  		
 }    	 			 	 
  function suiranx_nav_date17()    		 	   	           	
    {    	  	 	      	 		    
        $date = date("m-d",strtotime("-13 day"));    							       	     
        return $date;    		   			     	 		 	 
 }     				 		
  function suiranx_nav_date18()    		 	   	    		    	 
    {    	  	 	      							 
        $date = date("m-d",strtotime("-12 day"));    							       			   
        return $date;    		   			       	 	 	
 }     		 	  	
  function suiranx_nav_date19()    		 	   	    	 	 		 	
    {    	  	 	      			 			 
        $date = date("m-d",strtotime("-11 day"));    							       	 	 		
        return $date;    		   			     	 	    
 }    				  	 
  function suiranx_nav_date20()    		 	   	    	  	 	  
    {    	  	 	      	  		 		
        $date = date("m-d",strtotime("-10 day"));    							      		 		 	
        return $date;    		   			    			  	 	
 }    		    		
  function suiranx_nav_date21()    		 	   	    	 		   	
    {    	  	 	      		 				 
        $date = date("m-d",strtotime("-9 day"));    							       	 				
        return $date;    		   			    	  	 	  
 }    		 			  
  function suiranx_nav_date22()    		 	   	     	   			
    {    	  	 	       	 			  
        $date = date("m-d",strtotime("-8 day"));    							      	 	 			
        return $date;    		   			     	  		 	
 }    	  	   	
  function suiranx_nav_date23()    		 	   	         	 	
    {    	  	 	      			  			
        $date = date("m-d",strtotime("-7 day"));    							     	 	  		 
        return $date;    		   			    	  		   
 }         	  
  function suiranx_nav_date24()    		 	   	     			 	 	
    {    	  	 	       	    		
        $date = date("m-d",strtotime("-6 day"));    							      	      
        return $date;    		   			    				 	 	
 }    			  	  
  function suiranx_nav_date25()    		 	   	      			  	
    {    	  	 	       	   	 	
        $date = date("m-d",strtotime("-5 day"));    							     		   		 
        return $date;    		   			    		  				
 }    			 	  	
  function suiranx_nav_date26()    		 	   	     	 	 			
    {    	  	 	      			 				
        $date = date("m-d",strtotime("-4 day"));    							       	 		 	
        return $date;    		   			    	 		    
 }     	 				 
  function suiranx_nav_date27()    		 	   	     	 		 	 
    {    	  	 	      	 	     
        $date = date("m-d",strtotime("-3 day"));    							     		 	   	
        return $date;    		   			      	 			 
 }     		 	 		
  function suiranx_nav_date28()    		 	   	       	   	
    {    	  	 	       						 
        $date = date("m-d",strtotime("-2 day"));    							      			 	 	
        return $date;    		   			    	    	  
 }     						 
  function suiranx_nav_date29()    		 	   	    	  				 
    {    	  	 	      		 				 
        $date = date("m-d",strtotime("-1 day"));    							     	 	   	 
        return $date;    		   			       	  		
 }       			  
 function suiranx_nav_date30()    	   		 	    	   	 		
    {      		 	      	 				 	
        $date = date("m-d");     	 	  		    	     		
        return $date;    		   	      		   		 
 }     			   	 
       		    
     	   		  
     	 	 	 		
     	  		   
 function suiranx_nav_todayviews() {      	 	       		 		  	
    global $zbp;    	  	 	 	     		 		  
  $settime = strtotime(date('Y-m-d',time()));    	  	 		        		 	 
  $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('>', 'ViewTime', $settime)));    			  		      	 	 	  
  $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');     	 		  	    		  	  	
 return $num;      							    		 		 		
}      	  	 	    	   	 		
//  function suiranx_nav_todaynum() {      	 				        	   
//     global $zbp;     	     	        				
//   $settime = strtotime(date('Y-m-d',time()));    		 	  		    	 		 		 
//   $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array(array('>', 'ViewTime', $settime),array('GROUP BY aid')));      		 		       			  	
//   $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');       			 	    		    		
//  return $num;     		   			    	 		 			
// }    	 			 	         	  	
    	  	   	    	     		
 function suiranx_nav_monthviews() {      	 	  	    	  			 	
    global $zbp;     	 	        		 		  	
    $datetime=mktime(0,0,0,date('m'),1,date('Y'));     			   	       			 	
    $datetimeb=mktime(23,59,59,date('m'),date('t'),date('Y'));     	  	 	     		      
    $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array('BETWEEN', 'ViewTime', $datetime, $datetimeb));       		 		    		  	 	 
    $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');      	  			      	  		 
    return $num;     	 	   	     			     
}      		 	        	 	  	
//  function suiranx_nav_monthnum() {     	     	    					  	
//     // $datetime=mktime(0,0,0,date('m'),1,date('Y'));    	   	 	     		  		 	
//     // $datetimeb=mktime(23,59,59,date('m'),date('t'),date('Y'));    			 			     	 	 	   
//     // $s = $zbp->db->sql->Count($zbp->table['ViewInfo'], array(array('COUNT', '*', 'num')), array('BETWEEN', 'ViewTime', $datetime, $datetimeb));    	 	  		       	 			 
//     // $num = GetValueInArrayByCurrent($zbp->db->Query($s), 'num');    		 		 	      	 	   	
//     // return $num;     	  		 	      	 				 
// }    			 	       	 			   
 function suiranx_nav_allnum() {    				  	      	    		
    global $zbp;    	 						         	 	
  $db = $zbp->db->sql->get();    		 	  		    				 	 	
  $sql = $db->select('zbp_post')->where(array(array('=','log_Status','0'),array('>','log_ViewNums','0')))->sql;    	 			       		 	  		
  $array = $zbp->GetListType('Post', $sql);    				 	       			    
  echo count($array);        			      		 	  		
}     	     	      	  		 
?>