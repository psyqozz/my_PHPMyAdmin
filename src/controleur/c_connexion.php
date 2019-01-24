<?php
//
// ETNA PROJECT, 06/11/2018 by juzain_d
// controleur connexion
// File description:
//      ...
//

    if(!isset($_REQUEST['action'])) {
        $_REQUEST['action'] = 'requestCo';
    }
    $action = $_REQUEST['action'];
    switch($action){
        case 'requestCo':{
            include("vues/v_connexion.php");
        break;
        }
        case 'confirmCo':{
            $user = $_REQUEST['user'];
            $mdp = $_REQUEST['password'];
            $co = $pdo->test_co($user, $mdp);
            if(!$co){
                $pdo->ajouterErreur("incorrect password or login");
                include("vues/v_error.php");
                include("vues/v_connexion.php");
            }
            else{
                include("vues/v_sommaire.php");
            }
        break;
        }
        default :{
        include("vues/v_connexion.php");
        break;
        }
    }




?>

