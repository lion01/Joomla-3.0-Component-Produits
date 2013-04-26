<?php
session_start();
require_once ('includes/main.php');
    

try {
		if(isset($_GET["category"])){
		$_SESSION['cat'] = $_GET["category"];
		$c = new CategoryController();
		}
		else if(isset($_GET["addpanier"])) {
            

		$c = new PanierController();	
		
		}
        else if(isset($_GET["addquantity"])) {
            
            $c = new PanierController();
        }
		else if(isset($_GET["item"])){
		$c = new ItemController();
		
		}
		
		else if(isset($_GET["panier"])){
		$c = new PanierViewController();
		
		}
    
        else if(isset($_GET["delete"])) {
        
            $c = new PanierController();
            
        }
		else if(empty($_GET)) {
		
		$c = new HomeController();
	}
	
	else throw new Exception('Erreur de page');
	
	$c->handleRequest();

}

catch (Exception $e) {
	render ('error', array('message' => $e->getMessage()));

}


