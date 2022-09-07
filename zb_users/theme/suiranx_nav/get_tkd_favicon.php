<?php /* EL PSY CONGROO */ /* EL PSY CONGROO */            	  	    			   	 
require_once '../../../zb_system/function/c_system_base.php'; 	      	         			   	 
global $zbp;        		 	 	
if(isset($_GET['url'])){    		 		       	  	        		   			      	 	 	 
	$url = $_GET['url'];         		  	 	  			        		 	
    if (empty($url)) {       	 			     		  	 	
        echo "<script>alert('请输入网址！')</script>";    				  	     	 	  	 	
            exit;    		   		      	  		 	
    } else {     	  			     		 			  
        if (!suiranx_nav_domain($url)) {    		   	         		   
            echo "<script>alert('请输入正确的网址')</script>";      	 		 	        	   
            exit;      	   		    				 			
        }    	  	  	      	  	 		
    }      			 	             
    //$data = file_get_contents("http://".$url);      			  			
    $data = file_get_contents("".$url);     		   	 
    $ico = "http://www.google.cn/s2/favicons?domain=".$url;    	   	 		
    //$ico = "$zbp->host/zb_users/theme/suiranx_nav/plugin/get_ico/ico.php?url=".$url;    	   	 	     			  	  
    $meta = array();       				        	 			
    if (!empty($data)) {    	            		  	  
      			 	     		  				
        $wcharset = preg_match("/<meta.+?charset=[^\w]?([-\w]+)/i",$data,$temp) ? strtolower($temp[1]):"";    	   	       				 	 	
        #Title     					 	    	 	 	 	 
        preg_match('/<META\S+charset="([\w\W]*?)"/si', $data, $matches);    		 	 	      		 	    
        if (!empty($matches[1])) {    	  			 	    	   				
            $meta['charset'] = $matches[1];    			 	            	  
        }    			 	 	     	  			  
           	     	     					   
        header("Content-Type:text/html;charset=".$wcharset);    					 		    	 	  			
        #Title                 						 
        preg_match('/<TITLE>([\w\W]*?)<\/TITLE>/si', $data, $matches);      		 			    	  	  		
        if (!empty($matches[1])) {    	 				       		   		
            $meta['title'] = $matches[1];    							     		  	  	
        }     	   	       			  	 
             	 	 	 	    		     	
        #Keywords     		          			  		
        preg_match('/<META\s+name="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);           	   	 	    	 	 	 		
        if (empty($matches[1])) {    	 	  			    	 	 		  
            preg_match("/<META\s+name='keywords'\s+content='([\w\W]*?)'/si", $data, $matches);              	 	         		 	  	 
        }    	  			 	    		 			  
        if (empty($matches[1])) {    		    		      		 		 
            preg_match('/<META\s+content="([\w\W]*?)"\s+name="keywords"/si', $data, $matches);              	  	 	 	      		 	  
        }           	     	     	
        if (empty($matches[1])) {     	 	 			    	 		  	 
            preg_match('/<META\s+http-equiv="keywords"\s+content="([\w\W]*?)"/si', $data, $matches);                			 		 	     	   	  
        }     	 			 	     		 				
        if (!empty($matches[1])) {    		 	 		     	  					
            $meta['keywords'] = $matches[1];      	 	       	  	  		
        }      	 	        		  	 	
            	  		  	    			 			 
        #Description     	   	 	    	 	  		 
        preg_match('/<META\s+name="description"\s+content="([\w\W]*?)"/si', $data, $matches);           		     	    	 	 			 
        if (empty($matches[1])) {    				   	    	 	 	  	
            preg_match("/<META\s+name='description'\s+content='([\w\W]*?)'/si", $data, $matches);                 	   		    							 
        }    				  	        		  	
        if (empty($matches[1])) {     	 		 	     		 	  	 
            preg_match('/<META\s+content="([\w\W]*?)"\s+name="description"/si', $data, $matches);                       			  			      	 		 	
        }          	     	    		 
        if (empty($matches[1])) {    			   	      	   	  
            preg_match('/<META\s+http-equiv="description"\s+content="([\w\W]*?)"/si', $data, $matches);             	  			 	         	 	
        }       		 		    	     	 
        if (!empty($matches[1])) {      	 	 		      		 	  
            $meta['description'] = $matches[1];     			 		     					 		
        }      		 			    	 						
    }	 	         				    	 	 	  	     					 	
        echo '<script type="text/javascript">';    	 		   	    				 	 	
        echo ' var caijiContent=editor_api.editor.content.get();';       	 			    			  		 
        echo '$("#meta_coverimg").attr("value", "'.$ico.'");';    		    	      	   		 
        echo '$("#edtTitle").attr("value", "'.$meta['title'].'");';                 	  	 	 
        echo '$("#meta_artkeywords").attr("value", "'.$meta['keywords'].'");';        			       	   		
        echo 'editor_api.editor.content.put(caijiContent+"'.$meta['description'].'");';     	 	 	       						 
        echo '</script>';      	 	 		     	  			 
        } 	    		 	 	      	 				  
?>