<?php
    //include_once("header.php");
    require_once("ClassProduit.php");
    if(isset($_GET["id"])){
        $pdt=new Produit();
        $pdt=$pdt->get($_GET["id"]);
    }
    
    if(!empty($_POST)){
        $produit = new Produit($_POST["nom"],$_POST["pu"],$_POST["pv"],$_POST["stock"],$_POST["images"]);
        $produit ->save();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">    
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <div class="form">
            <label >Nom</label>
            <input type="text" name="nom" required value="<?=$pdt ['nom'] ?? ''?>"><br>
            <label >PrixVente</label>
            <input type="number" name="pv" required value="<?=$pdt ['pv'] ?? ''?>"><br>
            <label >PrixUnit</label>
            <input type="number" name="pu" value="<?=$pdt ['pu'] ?? ''?>"><br>
            <label >Stock</label>
            <input type="number" name="stock" value="<?=$pdt ['stock'] ?? ''?>"><br>
            <label >Image</label>
            <input type="file"  name="images" accept=".png,.jpg,.jpeg" value="<?=$pdt ['images'] ?? ''?>"><br>
            <input type="submit" value="Enregistrer" name="button">
            <a href="produits.php">Liste des produits</a>
            <a href="action.php">Action sur les produits</a>
        </div>
    </form>

</body>
</html>
