<?php
    require_once("ClassProduit.php"); 
    $prod=new Produit();
    $tab = $prod->all();
?>
<link href="style.css" rel="stylesheet">
<table>
    <tr>
        <th>ID</th>
        <th>NOM</th>
        <th>PRIX UNITAIRE</th>
        <th>PRIX VENTE</th>
        <th>STOCK</th>
        <th>IMAGE</th>

    </tr>  
    <?php
        foreach ( $tab as $pp) { ?>
            <tr>
                <td><?=$pp ["id"] ?></td>
                <td><?=$pp ["nom"] ?></td>
                <td><?=$pp ["pu"] ?>FCFA</td>
                <td><?=$pp ["pv"] ?>FCFA</td>
                <td><?=$pp ["stock"] ?></td>
                <td><img src="image/<?=$pp ["images"] ?>" alt="<?=$pp ["images"] ?>" height="50" width="50"></td>

            </tr>  
        <?php 
        } 
    ?>
</table>
<a href="produit.php"><h2>Enregistrer un nouveau produit</h2></a>