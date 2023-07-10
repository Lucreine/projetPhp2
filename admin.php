<?php
    require_once("ClassAdmin.php"); 
    if(!empty($_POST)){
        if($_POST["confirmpwd"]==$_POST["pwd"]){
            $client = new Client($_POST["nomad"],$_POST["email"],$_POST["pwd"],$_POST["confirmpwd"]);
            $client ->savead();
            header("Location:header.php");
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
<body>
<form action="" method="POST">
    <div class="form">
        <label >Nom Admin</label>
        <input type="text" name="nomad" required value="<?=$_POST['nomad'] ?? ''?>"><br>
        <label >Email</label>
        <input type="text" name="email" required value="<?=$_POST['email'] ?? ''?>"><br>
        <label >Password</label>
        <input type="text" name="pwd" value="<?=$_POST['pwd'] ?? ''?>"><br>
        <label > Confirme Password</label>
        <input type="text" name="confirmpwd" value="<?=$_POST['confirmpwd'] ?? ''?>"><br>
        <input type="submit" value="Enregistrer" name="button">
    </div>
    
</form>