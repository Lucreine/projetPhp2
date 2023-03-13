<?php
    //require_once("header.php");
    require_once("ClassProduit.php"); 
    if(isset($_GET["id"])){
        $pdt=new Produit();
        $pdt=$pdt->delete($_GET["id"]);
    }
    $prod=new Produit();
    $tab = $prod->all();
?>
<link href="style.css" rel="stylesheet">
<a href="produit.php"><h2>Ajouter</h2></a>
<table>
    <tr>
        <th>ID</th>
        <th>NOM</th>
        <th>PRIX UNITAIRE</th>
        <th>PRIX VENTE</th>
        <th>STOCK</th>
        <th>ACTION</th>
    </tr>  
    <?php
        foreach ( $tab as $pp) { ?>
            <tr>
                <td><?=$pp ["id"] ?></td>
                <td><?=$pp ["nom"] ?></td>
                <td><?=$pp ["pu"] ?>FCFA</td>
                <td><?=$pp ["pv"] ?>FCFA</td>
                <td><?=$pp ["stock"] ?></td>
                <td>
                    <a href="produit.php?id=<?=$pp ["id"]?>">Modifier</a> 
                    <td><a href="?id=<?=$pp ["id"]?>">Supprimer</a></td>
                </td>

            </tr>  
        <?php 
        } 
    ?>
</table>