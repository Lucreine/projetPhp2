<?php
    session_start();
    $_SESSION['email']=$_POST['email'];
    $_SESSION['pwd']=$_POST['pwd'];
    HEADER('Location:affclient.php');

    // Démarrage de la session
    session_start();
    // On vérifie si le champ Login n'est pas vide.
    if ($_SESSION['email']=='')
    // Si c'est le cas, le visiteur ne s'est pas loger et subit une redirection
    { 
        Header('Location:client.php');
    }
    else
    {
         echo "  <a href src='Disconnect.php'> Se déconnecter </a> || Utilisateur: ". $_SESSION['email'] ."";  
    }
    // Test De vérification que l'user est bien dans la liste des utilisateurs Mysql
    // Connexion à la base de données MySql
    $DataBase = mysql_connect ( "localhost" , 'root' , '', "authentification") ;
    // Cette table contient la liste des users enregistrés.
    mysql_select_db ( "mysql" , $DataBase );
    // Nous allons chercher le vrai mot de passe ( crypté ) de l'utilisateur connecté
    // Cryptage du mot de passe donné par l'utilsateur à la connexion par requête SQL
    $Requete ="Select client('".$_SESSION['pwd']."');";
    $Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;
    while (  $ligne = mysql_fetch_array($Resultat)  )
    // Le vrai mot de passe crypté est sauvergardé dans la variable $RealPasswd
    {
        $RealPasswd=$ligne["client('".$_SESSION['email']. "')"];
    }
    // Initialisation à Faux de la variable "L'utilisateur existe".
    $CheckUser=False;
    // On interroge la base de donnée Mysql sur le nom des users enregistrés
    $Requete ="Select pwd,nomcli From client";
    $Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;
    while (  $ligne = mysql_fetch_array($Resultat)  )
    {
    // Si l'utilisateur X est celui de la session
        if ( $ligne['nomcli']==$_SESSION['email'])
        {
            // Alors on vérifie si le mot de passe est le bon
            If ($RealPasswd == $ligne['pwd'])
            // Si le couple est bon, c’est que l’utilisateur est le bon.
            {
                $CheckUser=True;
            }
        }
    }
    // Si l'utilisateur n'est toujours pas valide à la fin de la lecture tableau
    if ( $CheckUser==False )
    // Redirection vers la fenêtre de connexion.
    {
        Header('Location:lClassCient.php');
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
        <input type="text" name="email" required value="<?=$_POST['email'] ?? ''?>">
        <label >Password</label>
        <input type="text" name="pwd" value="<?=$_POST['pwd'] ?? ''?>">
        <input type="submit" value="Enregistrer" name="button">
    </div>   
</form>