<?php
require_once 'includes/helpers.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/CategoryController.php';
require_once 'Controllers/PanierController.php';
require_once 'Controllers/PanierViewController.php';
require_once 'config/inc.conf.php';
require_once 'Models/Produits.php';
require_once 'Models/Panier.php';
header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: ".gmdate("D, d M Y H:i:s",time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s",time()+3600)." GMT");

?>