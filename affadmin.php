<?php
    require_once("ClassAdmin.php"); 
    $prod=new Admin();
    $tab = $prod->selectadmin();
?>
<link href="style.css" rel="stylesheet">
<table>
    <tr>
        <th>ID DE L'ADMINISTRATEUR</th>
        <th>NOM DE L'ADMINISTRATEUR</th>
        <th>EMAIL</th>
    </tr>  
    <?php
        foreach ( $tab as $pp) { ?>
            <tr>
                <td><?=$pp ["idad"] ?></td>
                <td><?=$pp ["nomad"] ?></td>
                <td><?=$pp ["email"] ?></td>

            </tr>  
        <?php 
        } 
    ?>
</table>
<a href="admin.php"><h2>Enregistrer un nouveau ADMINISTRATEUR</h2></a>