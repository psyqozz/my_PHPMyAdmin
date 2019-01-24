<?php
#!/usr/local/bin/php
// ETNA PROJECT, 05/11/2018 by juzain_d
// html
// File description:
//      ...
    include ('vues/v_entete.php');
    require_once ('include/class_pdo.php');
    echo "<link href='../style/styles.css' rel='stylesheet' type='text/css' />";
    $pdo = PdoPhpadmin::getPdoPhpAdmin();
    if(!isset($_REQUEST['uc'])){
        $_REQUEST['uc'] = 'connexion';
    }
    $uc = $_REQUEST['uc'];
    switch($uc){
        case 'connexion':{
            include("controleur/c_connexion.php");break;
        }
        case 'gererBdd' :{
            include("controleur/c_gererBdd.php");break;
        }
        case 'manageTable' :{
            include("controleur/c_manageTable.php");break;
        }
    }
?>