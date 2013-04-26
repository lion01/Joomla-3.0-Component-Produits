<?php
 class PanierViewController{

 	public function handleRequest(){
 	$panier = new Panier();
        $produits = new Produits();
 	$id;
        $nb;
        /* récuperation des clés ids sessions */
        
       
        
    $ids = array_keys($_SESSION["panier"]);
        
        
        if(empty($ids)){
            $myproducts = array();
            
        }
        else {
            
            $myproducts=$produits->getItems($ids);
        }
       
      $nb = $produits->getTotal();
 	
 		
                
        
 	render('panier', array(
	'title' => "mon panier",
        'products' => $myproducts,
        'nbitems' => $nb
		));

 	}
 	


}



?>