<?php
 class PanierController{

 	public function handleRequest(){
    $id= $_GET["id"];

        
    $json = array('error' => true);
    $panier = new Panier();
    $produits = new Produits();
    $produit;
    $nb;
    
    /*** début ajout session **/
        
        if(isset($_GET["addpanier"])&& isset($id) ) {
        $panier->addItem($id);
        $json['message'] = 'Le produit a bien été ajouté';
        }
        /** si delete produit début suppression produit **/
        
        else if(isset($_GET["delete"]) && isset($id)) {
             
            $produit = new Produits($_GET["id"]);
            $json['message'] = 'Le produit: '.(string)$produit->items->title.' a bien été supprimé de votre panier';
            $panier->del($_GET["id"]);
           
            
        }
        else if(isset($_GET["addquantity"]) && isset($_GET["number"])){
            $produit = new Produits($_GET["id"]);
            $panier->addQuantity($id,$_GET["number"]);
            $json['message']='La quantité de produit:'.(string)$produit->items->title.' a bien été modifiée';
        }
        $json['error'] = false;
      
        //echo ($_SESSION["panier"][$id]);
        /* récuperation des clés ids sessions */
        $ids = array_keys($_SESSION["panier"]);
       
      
        echo json_encode($json);
 		/** fin ajout session **/
        
     
       

 	}
 	


}



?>