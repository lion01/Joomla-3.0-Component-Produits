<?php


class Produits{
public $items;
public $nb;
public $id;
public $products;

public $ids=array();
function __construct($id=NULL) {
	global $dbh;
$this->id = $id;
	if($this->id!=NULL){
	$req = $dbh->prepare('SELECT * FROM products WHERE id=? LIMIT 1');
		try {
			$req->execute(array($this->id));
			if($row = $req->fetch(PDO::FETCH_OBJ)) {
				$this->items = $row;
				
			}
		}
				catch( Exception $e ){
		  echo 'Item invalide : ', $e->getMessage();
		}

	}
	else{
	$req = $dbh->prepare('SELECT * FROM products LIMIT 10');
		try {
		$req->execute();
			if($row = $req->fetchAll(PDO::FETCH_OBJ)) {
			$this->items = $row;
			//echo $this->items[1]['description'];
			}
		
		
		}
		catch (Exception $e) {
		
		
		  echo 'Erreur de listage items : ', $e->getMessage();
		}
	
	}
return $this->items;

}
    public function getItems($ids=array())
    {
        $this->ids=$ids;
        global $dbh;
        $myproducts = $dbh->prepare('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
        try{
            $myproducts->execute();
            if($row = $myproducts->fetchAll(PDO::FETCH_OBJ)) {
                $this->products = $row;
               
            }
        }
        catch (Exception $e) {
            
            
            echo 'Produits non trouvés : ', $e->getMessage();
		}
        return $this->products;

            }
    

    public function getTotal() {
        $this->ids=$ids;
	$this->nb=array_sum($_SESSION["panier"]);
		return $this->nb;
        }
    }

?>