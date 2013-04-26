<?php render ('_header', array('nbproduits'=>$nbitems)); ?>
<div class="title"><h4><i><?php echo $title; ?></i></h4></div>
<hr />

<!-- début conteneur panier -->
<div id="panierBlck">
    <div class="wrap">
        <ul>
            <li class="back"><a href="javascript:history.back()">back</a></li>
        </ul>
        <br />
        <table>
            <caption style="caption-side:bottom">Articles</caption>
               <thead>
                <tr>
                    <th id="prodhead"> Produit | </th><th> Description | </th><th> Prix | </th> <th> Quantité | </th>
                </tr>
               </thead>
               <tbody>
    <!-- récupération des ids sessions -->

    <?php $total='';

        $_SESSION["total"]='';?>
    <?php foreach ($products as $product) {
        echo "<tr>";
        echo "<td>".$product->title."</td>";
        $total +=$product->price*$_SESSION["panier"][$product->id];
        $_SESSION["total"]=$total;
        echo "<td>".$total."</td>";
        echo "<td><input type='number' min='1' max='10' step='1' value='".$_SESSION["panier"][$product->id]."' id='".$product->id."' class='selquantity' ></td>";
        echo "<td><a href='?delete&id=".$product->id."' class='delproducts'><img src='images/poubelle.png' width='50' height='50' class='tinyimg'/></a></td>";
        echo "</tr>";

    }?>
               </tbody>
        <tr class="rowtotal">
            <td>Total : <span class="total"><?php echo $total; ?></span></td>
        </tr>

        </table>
    </div>
    <hr />
    <article id="paniertotal">nombre d&apos;article: <?php echo $nbitems; ?></article>
    <?php $_SESSION["nb"]=$nbitems; ?>
</div>

<?php include ('_footer.php'); ?>