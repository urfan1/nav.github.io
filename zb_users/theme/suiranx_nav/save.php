<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */    		 	    				 	       	 	 			        	       			  			    			 	 	     	  	 			    					 		
require '../../../zb_system/function/c_system_base.php';    		  			     	   				    	    		     		 	 			     	   			     		    	     	 	 			      	 	  	 
require '../../../zb_system/function/c_system_admin.php';    		   	      	 	    	     		 	 		      	  		       	         	   	 	     		   	        					 
$zbp->Load();    	 	 	 		    	 	           		 	      		 		       								    			 		          		 	    					  	
$action='root';       		 	      	 				       		  	        		 		    			 	  	    			   		    	 	 	 		    	 		 	 	
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}     				         	  		       	  	 	    		   		      	  	  	    								    	  	  	        		   
if (!$zbp->CheckPlugin('suiranx_nav')) {$zbp->ShowError(48);die();}    	 		  		    			   		     	 	        	  	 		     		 	 	      	 		 	      		 		  	      	  			
     	 		 	        				     		 	  	     			  		     	 		 			     	 	  	      		 	  	     	   	  
if($_GET['type'] == 'logo' ){       		 		    		  	 		    	 		 			      	 				    		 	        					 	     			  			      		 		 
	global $zbp;    			  	 	    	  	         			        	 		         	 					      			 		    					 	      					  
	foreach ($_FILES as $key => $value) {        	 	     				 			    			 		 	     		  	 	     	 	 	 	     		 	 	       			 		     	   	 	
		if(!strpos($key, "_php")){     				 	 	      						    			 	 		      	  	 	    			  			          	     	 	  	       			  		
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {    			 	 	       	 	       				 	       				       	   			     			 	           		       			 			
				$tmp_name = $_FILES[$key]['tmp_name'];     	   	 	    	 	   		    			  	       	  		 	     		         	  		  	     	  		        	   	 
				$name = $_FILES[$key]['name'];         	 	    	  	   	      			       	 	  	      		     	    	 			       						      					 		
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'theme/suiranx_nav/image/logo.png');    			 	  	    					 		     		  			     					       		   	     		 	  	     	 	  			     		    	
			}    	 				      		    	     			 	 	     	 				 	    				 	 	    	 				 	    	  	 	 	    			 	   
		}     	 	 	       		 			      	 				       		  		     	 	   	     	  	  	    			 	        			    
	}    				          	  			    	  				      				         				        	          			 			    			 	 	 
	$zbp->SetHint('good','LOGO修改成功');    	 			 		      		 		       	   		       	  	     		 	 	          				     	     	    		 					
	Redirect('main.php?act=base_set');     	  	 	     		 	 	 	      	  			    	  	  	      			 	 	    		 		  	      	 				    				  		
}    								     	  	 		    			   	      		 	        	  		 	     			  	    			  			
if($_GET['type'] == 'darklogo' ){       		 		    		  	 		    	 		 			      	 				    		 	        					 	     			  			    	 				  
	global $zbp;    			  	 	    	  	         			        	 		         	 					      			 		    					 	      	 			 	
	foreach ($_FILES as $key => $value) {        	 	     				 			    			 		 	     		  	 	     	 	 	 	     		 	 	       			 		    	 						
		if(!strpos($key, "_php")){     				 	 	      						    			 	 		      	  	 	    			  			          	     	 	  	      	 	     
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {    			 	 	       	 	       				 	       				       	   			     			 	           		      		 		   
				$tmp_name = $_FILES[$key]['tmp_name'];     	   	 	    	 	   		    			  	       	  		 	     		         	  		  	     	  		      	 	 				
				$name = $_FILES[$key]['name'];         	 	    	  	   	      			       	 	  	      		     	    	 			       						         	  		
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'theme/suiranx_nav/image/darklogo.png');    			 	  	    					 		     		  			     					       		   	     		 	  	     	 	  			     	 	    
			}    	 				      		    	     			 	 	     	 				 	    				 	 	    	 				 	    	  	 	 	    	 	   	 
		}     	 	 	       		 			      	 				       		  		     	 	   	     	  	  	    			 	       		 			  
	}    				          	  			    	  				      				         				        	          			 			     	  	   
	$zbp->SetHint('good','LOGO修改成功');    	 			 		      		 		       	   		       	  	     		 	 	          				     	     	     		 			 
	Redirect('main.php?act=base_set');     	  	 	     		 	 	 	      	  			    	  	  	      			 	 	    		 		  	      	 				    		  	   
}        	 		 		 
if($_GET['type'] == 'favicon' ){     		 		 	    		    		          		    				        	 			 	      		  	 	     	   	 	    			  			
	global $zbp;    	 			 	     	     	       	 	       	 	 	  	    	   	 	     		  	 		      					     		      
	foreach ($_FILES as $key => $value) {    	 	 			     			 				        				     	 	  		    	    	       	  			       	         		 		 	 
		if(!strpos($key, "_php")){    		  			     			 	 	     	 			 	     	    	       	 	        		  	         	  	 	    	 		   	
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {    		 	 		        		 	     		 		 	     		 			 	       	 	         				      	    	     	 					 
				$tmp_name = $_FILES[$key]['tmp_name'];     	 	        		 	   	        	  	      	 				     				  	     	     	      			  	      	 	   
				$name = $_FILES[$key]['name'];     		 	  	    	  	 		      					 	    	   	       			 		 	    	 	   		      		 		       	 				
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'theme/suiranx_nav/image/favicon.ico');    	 	 	 	     	 				 	    				 	 	     	 		  	    	   				    	 			        							    	 		  	 
			}        	  	    			   	        	   	    	   				    	 	 			      			 			    		 		 		    		  				
		}    		 	 			    		 				     				 		      							    			  			     	    	      	 					    	  	 			
	}     	 	 	 	     		 				      		 			     	   	 	    					 	     		    	        	   	    			  	  
	$zbp->SetHint('good','favicon图标修改成功');      	   		    	  		 	       				 	    		 	 			    		 		       		 	 			     	  	          			 	
	Redirect('main.php?act=base_set');      	 				    	 	  		     								    			  	       	 		  	       		        	  	  	      	    	
}    	   		       		   		    		  			      	  			      	   		     						      		 	   	    	 		  		
?>
