<?php
//
// ETNA PROJECT, 07/11/2018 by juzain_d
// error
// File description:
//      ...
//
?>

<div class ="error">
     <ul>
    <?php 
     foreach($_REQUEST['erreurs'] as $erreur)
         {
             echo "$erreur<br>";
         }
     ?>
    </ul>
</div>