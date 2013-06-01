<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$ABSPATH=explode('/',$_SERVER["REQUEST_URI"]);
?>


<section class="module_produits">
    <ul class="listproducts">
	<?php foreach($this->items as $itemp) { ?>
        <?php echo "<li><a href='index.php?option=com_produit&view=produit&id=".$itemp[2]."'><div class='box'>"; ?>
		<?php echo "<img src='/".$ABSPATH[1].'/'.$itemp[3]."' width='130' height='130' class='product-img' align='center' />"; ?>
		<?php echo "<br />".$itemp[0]."<br />";?>
        <?php echo "</div></a></li>"; ?>
	<?php } ?>
    </ul>
</section>	
