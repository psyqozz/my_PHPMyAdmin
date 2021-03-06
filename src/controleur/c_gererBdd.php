<?php
//
// ETNA PROJECT, 06/11/2018 by juzain_d
// gerer la bdd
// File description:
//      ...
//

    include("vues/v_sommaire.php");
    $action = $_REQUEST['action'];
    switch($action) {
        case 'createDatabase':{
            include("vues/form_create_bdd.php");
            break;
        }
        case 'confirmCreate': {
          if(!empty($_REQUEST['nameBDD'])) {
            $namebdd = htmlentities($_REQUEST['nameBDD']);
            $crea=$pdo->creaBdd($namebdd);
            if($crea == true && $crea != "") {
                echo "Database Create !";
                include("vues/form_create_bdd.php");
                $DB = $pdo->show_Database();
                include("vues/v_showDatabase.php");
            } else {
               $pdo->ajouterErreur("failure request !");
                include("vues/v_error.php");
                include("vues/form_create_bdd.php");
            }
          }else {
              $pdo->ajouterErreur("failure to create, please write a name !");
              include("vues/v_error.php");
              include("vues/form_create_bdd.php");
              
          }
          break;
        }
        case 'editDatabase': {
            $DB = $pdo->show_Database();
            include("vues/form_edit_bdd.php");
            break;
        }
        case 'confirmEdit': {
            if(!empty($_REQUEST['newName']) && !empty($_REQUEST['oldName'])) {
                $newName = htmlentities($_REQUEST['newName']);
                $oldName = htmlentities($_REQUEST['oldName']);
                $modif = $pdo->modifBdd($oldName, $newName);
                if($modif == true) {
                    echo "Succesful edit !";
                    $DB = $pdo->show_Database();
                    include("vues/form_edit_bdd.php");
                    include("vues/v_showDatabase.php");
                    
                } else {
                    $pdo->ajouterErreur("failure request !");
                    include("vues/v_error.php");
                    $DB = $pdo->show_Database();
                    include("vues/form_edit_bdd.php");
                }
            } else {
                $pdo->ajouterErreur("failure to edit ! Write a new name.");
                include("vues/v_error.php");
                $DB = $pdo->show_Database();
                include("vues/form_edit_bdd.php");
            }
            break;
        }
        case 'deleteDatabase': {
            $DB = $pdo->show_Database();
            include("vues/form_delete_bdd.php");
            break;
        }
        case 'confirmDelete':{
            if(!empty($_REQUEST['nameBDD'])) {
                $namebdd = htmlentities($_REQUEST['nameBDD']);
                $supp = $pdo->suppBdd($namebdd);
                if($supp == true) {
                    echo "Succesful drop !";
                    $DB = $pdo->show_Database();
                    include("vues/form_delete_bdd.php");
                    include("vues/v_showDatabase.php");
                } else {
                    $pdo->ajouterErreur("failure request !");
                    include("vues/v_error.php");
                    $DB = $pdo->show_Database();
                    include("vues/form_delete_bdd.php");
                }
            }
            break;
        }
        case 'statsDatabase': {
            $DB = $pdo->show_Database();
            include("vues/form_stat_bdd.php");
            break;
        }
        case 'confirmStat': {
            if(!empty($_REQUEST['name'])) {
                $namebdd = htmlentities($_REQUEST['name']);
                $tables = $pdo->getnbTable($namebdd);
                $date = $pdo->getDate($namebdd);
                $memory = $pdo->getMemory($namebdd);
                $DB = $pdo->show_Database();
                include("vues/form_stat_bdd.php");
                include("vues/v_display_stats.php");
            }

        }
          
    }

?>

