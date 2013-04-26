<?php
class CategoryController{

public function handleRequest() {

	
	if($_SESSION['cat']!=''){
	echo "La categorie choisie est".$_SESSION['cat'];
	$cat = $_SESSION['cat'];
	}
	if(empty($cat)) {
			
			throw new Exception ("Aucune categorie ne correspond");
			
		}
		
		
		render('category', array(
		'title' => $cat
		));
		//'medias' => $medias));

}






}