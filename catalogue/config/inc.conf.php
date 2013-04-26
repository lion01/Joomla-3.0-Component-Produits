<?php
define('USER', 'root');
define('PASS', 'route');
define('DB','stock');
define('SERVER','localhost');

try {
	
	$dbh = new PDO("mysql:host=".SERVER.";dbname=".DB.";charset=UTF8",
			USER,PASS);
	$dbh->query("SET NAMES 'utf8'");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	error_log($e->getMessage());
	die("Erreur base de données".$e->getMessage());
	
}



?>