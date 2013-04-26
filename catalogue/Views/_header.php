
<!Doctype html>
	<head>
		<title><?php echo $title ?></title>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="Assets/js/main.js"></script>
		<link rel="stylesheet" href="Assets/css/main.css" media="screen and (max-width: 320px)"  />
                <link rel="stylesheet" href="Assets/css/medium.css" media="screen and (max-width: 1200px)"  />
	</head>
	<body>
		<header>
			<div id="logo" class="borderImage"><img src="images/digistore.png" /></div>
			<article id="subtitle"><i>Easy and fast online shopping</i></article>
			<nav>
				<ul>
					<li></li>
                                          <?php $rand0m = rand(10,100); ?>
        
						<li><label>Panier</label>

<a href="?panier&token=<?= $rand0m; ?>"><img src="images/panier.png" width="60px" height="60px" class="panier" /></a></li>
				
                  <li>|</li>
		
			
				<li>
					<label>Articles</label>
						<div id="nbtotal"><? 
						echo $nbproduits;
						?>
					
            
			</li>

		
				</ul>
			</nav>
		</header>
		<div id="subheader">
			<div class="wrap">
				<?php if (!isset($_GET["panier"])) {
                                    echo "<h4>Welcome|Bienvenue|Bemvenido|Buenvenido| @ DigiStore </h4>"
                                    ;
                                } ?>
				<?php if(isset($_SESSION["user"])) { echo $_SESSION["user"]["name"];} else { ?>
		
                            <ul>
                                <li><h5><a href="#">login</a></li> 
                                <li><a href="#">Create an account</a></h5></li>
                            </ul>
			<?php } ?>
			</div>

		</div>