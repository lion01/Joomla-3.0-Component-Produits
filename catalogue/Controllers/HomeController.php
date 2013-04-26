<?php 
	class HomeController{
	

	public function handleRequest(){
		
	$list = new Produits();
	$total = $list::getTotal();
	//echo (string)$total[0];
	$nb = $list->getTotal();
	render('home',array('title' =>'Catalogue MVC',
	'produits' => $list, 'nbproduits' =>$nb));

	}

	

}

?>