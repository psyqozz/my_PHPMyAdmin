<?php
//
// ETNA PROJECT, 07/11/2018 by juzian_d
// manage table
// File description:
//      ...
//

include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
switch($action) {
    case 'chooseDatabase':{
        $DB = $pdo->show_Database();
        include("vues/form_choose_bdd.php");
    break;
    }
    case 'showTable': {
        if(!empty($_REQUEST['name'])) {
            $nameDB = htmlentities($_REQUEST['name']);
            $tabs = $pdo->show_tab($nameDB);
            include("vues/v_manageTable.php");
            
         }
        break;
    }
    case 'CreateTable' : {
        if(!empty($_REQUEST['name']))
        {
            $nameDB = htmlentities($_REQUEST['name']);
            include("vues/form_create_tab.php");
        }
        break;
    }
        
case 'confirmCreateTab': {
        if(!empty($_REQUEST['name']) && !empty($_REQUEST['nameTab'])) {
            $nameDB = htmlentities($_REQUEST['name']);
            $nameTab = htmlentities($_REQUEST['nameTab']);
            $pdo->create_table($nameDB, $nameTab);
            $DB = $pdo->show_Database();
            include("vues/form_choose_bdd.php");
        }
        else {
            $pdo->ajouterErreur("failure to create table, please write a name !");
            include("vues/v_error.php");
            include("vues/form_create_tab.php");
        }
        
        break;
    }
    case 'editTable': {
        if(!empty($_REQUEST['name'])) {
             $nameDB = htmlentities($_REQUEST['name']);
             $tab = htmlentities($_REQUEST['nameTab']); 
             include("vues/form_change_tab.php");
        }
        break;
    }
    case 'confirmEdit': {
        if(!empty($_REQUEST['oldTab']) && !empty($_REQUEST['newName'])) {  
            $oldTab = htmlentities($_REQUEST['oldTab']);
            $newTab = htmlentities($_REQUEST['newName']);
            $nameDB = htmlentities($_REQUEST['name']);
            $pdo->change_name_tab($nameDB, $oldTab, $newTab);
            $tabs = $pdo->show_tab($nameDB);
            include("vues/v_manageTable.php");
        }
        else {
            $nameDB = htmlentities($_REQUEST['name']);
            $tab = htmlentities($_REQUEST['oldTab']);
            $pdo->ajouterErreur("failure to edit, please write a name !");
            include("vues/v_error.php");
            include("vues/form_change_tab.php");
        }
        break;
    }
    case 'dropTable':
    {
       if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $pdo->drop_table($nameDB, $nameTab);
                $tabs = $pdo->show_tab($nameDB);
                include("vues/v_manageTable.php");
            }
       break;
    }
    case 'AddColumn': {
        if(!empty($_REQUEST['name']))
        {
            $nameDB = htmlentities($_REQUEST['name']);
            $nameTab = htmlentities($_REQUEST['nameTab']);
            include("vues/v_addColumn.php");
        }
        break;
    }
    case 'confirmAdd': {
        if(!empty($_REQUEST['nameTab']) && !empty($_REQUEST['nameCol']))
        {
            $nameTab = htmlentities($_REQUEST['nameTab']);
            $nameCol = htmlentities($_REQUEST['nameCol']);
            $type = htmlentities($_REQUEST['type']);
            $nameDB = htmlentities($_REQUEST['name']);
            $pdo->add_column($nameDB, $nameTab, $nameCol, $type);
            $cols  = $pdo->show_column_Spe($nameDB, $nameTab);
            include("vues/v_addColumn.php");
            include("vues/v_showColumn.php");
            
        }else {
            $nameDB = htmlentities($_REQUEST['name']);
            $nameTab = htmlentities($_REQUEST['nameTab']);
            $nameCol = htmlentities($_REQUEST['nameCol']);
            $type = htmlentities($_REQUEST['type']);
            $cols  = $pdo->show_column_Spe($nameDB, $nameTab);
            $pdo->ajouterErreur("failure add column, please fill in the fields !");
            include("vues/v_error.php");
            include("vues/v_addColumn.php");
        }
        break;
    }
    case 'dropColumn': {
        if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/v_dropColumn.php");
            }
        break;
    }
    case 'confirmDrop' :
    {
        if(!empty($_REQUEST['nameTab']) && !empty($_REQUEST['nameCol']))
        {
            $nameTab = htmlentities($_REQUEST['nameTab']);
            $nameCol = htmlentities($_REQUEST['nameCol']);
            $nameDB = htmlentities($_REQUEST['name']);
            $pdo->drop_column($nameDB, $nameTab, $nameCol);
            $cols = $pdo->show_column_Spe($nameDB,$nameTab);
            include("vues/v_dropColumn.php");
            include("vues/v_showColumn.php");
        }

        break;

    }
    case 'editColumn' :
    {
        if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/v_editColumn.php");
            }
        break;
        
    }
    case 'confirmEditCol' :
    {
        if(!empty($_REQUEST['oldNameCol']) && !empty($_REQUEST['newNameCol']) && !empty($_REQUEST['type']))
            {
                $oldNameCol = htmlentities($_REQUEST['oldNameCol']);
                $newNameCol = htmlentities($_REQUEST['newNameCol']);
                $type = htmlentities($_REQUEST['type']);
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $pdo->change_column($nameDB, $nameTab, $oldNameCol, $newNameCol, $type);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/v_editColumn.php");
                include("vues/v_showColumn.php");
            }
        else {
            $nameDB = htmlentities($_REQUEST['name']);
            $nameTab = htmlentities($_REQUEST['nameTab']);
            $oldNameCol = htmlentities($_REQUEST['oldNameCol']);
            $newNameCol = htmlentities($_REQUEST['newNameCol']);
            $type = htmlentities($_REQUEST['type']);
            $cols  = $pdo->show_column_Spe($nameDB, $nameTab);
            $pdo->ajouterErreur("failure edit column, please fill in the fields !");
            include("vues/v_error.php");
            include("vues/v_editColumn.php");
        }
         break;
    }
    case 'countRows' :
    {
        if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                include("vues/v_countColumn.php");
            }
        break;
        
    }
    case 'numOfRow' :
    {
        if(!empty($_REQUEST['nameTab']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $nbRow = $pdo->count_row($nameDB, $nameTab);
                include("vues/v_countColumnBis.php");
            }
        else {
            $nameDB = htmlentities($_REQUEST['name']);
            $nameTab = htmlentities($_REQUEST['nameTab']);
            $pdo->ajouterErreur("failure count row, please fill in the fields !");
            include("vues/v_error.php");
            include("vues/v_countColumn.php");
        }
        
        break;
        
    }
    case 'request': {
        if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $vals = $pdo->show_values($nameDB, $nameTab);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/v_request.php");
                
            }
        break;
    }
    case 'insert':
    {
        if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/form_insert.php");
            }
        break;
    }
    case 'confirmInsert':
    {
        if(!empty($_REQUEST['name']) && !empty($_REQUEST['Values']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $values[] = $_REQUEST['Values'];
                $pdo->insert($nameDB, $nameTab, $values);
                $vals = $pdo->show_values($nameDB, $nameTab);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/v_request.php");
            }
        else {
            $nameDB = htmlentities($_REQUEST['name']);
            $nameTab = htmlentities($_REQUEST['nameTab']);
            $cols  = $pdo->show_column_Spe($nameDB, $nameTab);
            $vals = $pdo->show_values($nameDB, $nameTab);
            $pdo->ajouterErreur("failure to INSERT, please fill in the fields !");
            include("vues/v_error.php");
            include("vues/form_insert.php");
        }
        break;
    }
    case 'Uptdate' :
    {
        if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $col = htmlentities($_REQUEST['col']);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                $vals = $pdo->show_values($nameDB, $nameTab);
                include("vues/form_Uptdate.php");
            }
        break;
    }
    case 'confirmUptdate' :
    {
        if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $values[] = $_REQUEST['Values'];
                echo $values[0];
                $pdo->uptdate($nameDB, $nameTab, $values);
                $vals = $pdo->show_values($nameDB, $nameTab);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/v_request.php");
                
            }
        break;
    }
    case 'Delete':
    {
         if(!empty($_REQUEST['name']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $nameTab = htmlentities($_REQUEST['nameTab']);
                $id = htmlentities($_REQUEST['col']);
                $pdo->delete($nameDB, $nameTab, $id);
                $vals = $pdo->show_values($nameDB, $nameTab);
                $cols = $pdo->show_column_Spe($nameDB, $nameTab);
                include("vues/v_request.php");
                
            }
        break;
    }
    case 'WriteSQL':
    {
        $nameDB = htmlentities($_REQUEST['name']);
        include("vues/v_WriteSQL.php");
        break;
    }
    case 'ConfirmSQL':
    {
        if(!empty($_REQUEST['request']))
            {
                $nameDB = htmlentities($_REQUEST['name']);
                $request = $_REQUEST['request'];
                 if($pdo->request($request) == 1)
                    {
                        echo "Succesful request";
                        include("vues/v_WriteSQL.php");
                    }
                else
                    {
                        $pdo->ajouterErreur("failure Request !");
                        include("vues/v_error.php");
                        include("vues/v_WriteSQL.php");
                    }
                    
            }
        else
            {
                $pdo->ajouterErreur("failure Request, please fill in the fields !");
                include("vues/v_error.php");
                include("vues/v_Write.php");
            }
        break;
        
    }
}

?>