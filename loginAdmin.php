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