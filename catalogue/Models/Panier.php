<?php


class Panier{

    private $id;
    public $nb;
    
	function __construct()
 {

 	if(!isset($_SESSION)) {

 		session_start();
 		}


 		if(!isset($_SESSION['panier'])) {
 			$_SESSION['panier'] = array();
 		}

	}
    
    public function addItem($id){
              
        if(isset($_SESSION["panier"][$id])) {
            $_SESSION["panier"][$id] ++;
           
        }
        else {
            $_SESSION["panier"][$id] = 1;
         
        }
       
        
    }
    
    public function addQuantity($id,$number) {
        $_SESSION["panier"][$id] = $number;
    }
    
    public function del($product_id){
            $tok = rand(10,655);
        unset($_SESSION['panier'][$product_id]);
      
    }

}

?>