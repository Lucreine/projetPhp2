<?php
    require_once("ClassClient.php"); 
    if(!empty($_POST)){
        if($_POST["confirmpwd"]==$_POST["pwd"]){
            $client = new Client($_POST["nomcli"],$_POST["email"],$_POST["pwd"],$_POST["confirmpwd"]);
            $client ->savecli();
            header("Location:affclient.php");
        }else{            
            echo "Veuillez entrer le meme mot de passe.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">    
    <title>Document</title>
</head>
<form action="" method="POST">
    <div class="form">
        <label >Nom Client</label>
        <input type="text" name="nomcli" required value="<?=$_POST['nomcli'] ?? ''?>"> <br>
        <label >Email</label>
        <input type="text" name="email" required value="<?=$_POST['email'] ?? ''?>"> <br>
        <label >Password</label>
        <input type="text" name="pwd" value="<?=$_POST['pwd'] ?? ''?>"><br>
        <label > Confirme Password</label>
        <input type="text" name="confirmpwd" value="<?=$_POST['confirmpwd'] ?? ''?>"><br>
        <input type="submit" value="Enregistrer" name="button">
        <a href="client.php"><h2>Liste des clients</h2></a>
    </div>
    
</form>