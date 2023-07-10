<?php
    require_once("ClassClient.php");
    $cli = new Client ();
    if(isset($_POST['email'])&& isset($_POST['pwd'])){
        $email = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['pwd']);
        $sel=$cli->selectemailclient($email,$pwd);
        if($sel != null ){
            if($sel[0] == "admin@gmail.com"){
                header("Location:header.php");
            }else{
                header("Location:headerclient.php");
            }
        }else
        {
            echo " Email ou Mot de passe incorrect";
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
        <label >Email</label>
        <input type="text" name="email" required >
        <label >Password</label>
        <input type="text" name="pwd" >
        <input type="submit" value="Enregistrer" name="button">
    </div>   
</form>