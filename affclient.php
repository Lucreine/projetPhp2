<?php
    require_once("ClassClient.php"); 
    $prod=new Client();
    $tab = $prod->selectclient();  
?>
<link href="style.css" rel="stylesheet">
<table>
    <tr>
        <th>ID DU CLIENT</th>
        <th>NOM DU CLIENT</th>
        <th>EMAIL</th>
    </tr>  
    <?php
        foreach ( $tab as $pp) { ?>
            <tr>
                <td><?=$pp ["idcli"] ?></td>
                <td><?=$pp ["nomcli"] ?></td>
                <td><?=$pp ["email"] ?></td>

            </tr>  
        <?php 
        } 
    ?>
</table>
<a href="client.php"><h2>Enregistrer un nouveau client</h2></a>