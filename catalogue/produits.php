<?php
    session_start();
    require_once ('includes/main.php');
   
    if(isset($_GET["addpanier"])) {
      
        if(isset($_GET["id"])){
            
            $c = new PanierController();
        }
                    
            
    }
    
        
		
		
		
		else if(isset($_GET["panier"])){
            $c = new PanierViewController();
            
		}
		
    
    
$c->handleRequest();