<?php render('_header',array('title'=>$title,'nbproduits'=>$nbproduits)); ?>

<div class="wrap">
	<div class="products">
	<ul>
           
<?php foreach($produits->items as $produit) {
		echo "<li>";
		echo "<div class='chps'>".$produit->title;"</div>";
		echo "<div><img src='".$produit->img."'/></div>";
		echo "<div class='chps'> Price ".number_format($produit->price,2,',','')." €"."</div>";
		echo  "<a href='produits.php?addpanier&id=".$produit->id."' class='add'><div class='addBt'></div></a>";
	   	echo "<br /><br />";
		echo "</li>";
} ?>
	</ul>
</div>

</div>
<?php render('_footer'); ?>
