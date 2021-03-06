<?php
//
// ETNA PROJECT, 06/11/2018 by juzain_d
// class pdo
// File description:
//      ...
//

class PdoPhpAdmin{
    private static $dsn='mysql:host=localhost';
    private static $user='root' ;
    private static $pass='test' ;
    private static $myPdo;
    private static $myPdoPhp=null;
    
    public function test_co($use, $pass)
    {
        if ( $use =="root" && $pass == "test")
            return true;
        else {
            return false;
        }
    }

    function ajouterErreur($msg){
        if (! isset($_REQUEST['erreurs'])){
            $_REQUEST['erreurs']=array();
        }
        $_REQUEST['erreurs'][]=$msg;
    }
    private function __construct()
    {
        PdoPhpAdmin::$myPdo = new PDO(PdoPhpAdmin::$dsn, PdoPhpAdmin::$user, PdoPhpAdmin::$pass);
        PdoPhpAdmin::$myPdo->query("SET CHARACTER SET utf8");
    }
    public function _destruct()
    {
        PdoPhpAdmin::$myPdoPhp = null;
    }
   
    public  static function getPdoPhpAdmin()
    {
        if(PdoPhpAdmin::$myPdoPhp==null) {
            PdoPhpAdmin::$myPdoPhp= new PdoPhpAdmin();
        }
        return PdoPhpAdmin::$myPdoPhp;
    }

    public function show_Database()
    {
        $req = "SHOW DATABASES;";
        $data = PdoPhpAdmin::$myPdo->query($req);
        $lines = $data->fetchAll();
        return $lines;
    }
    public function show_tab($base) {
        $req = "SHOW TABLES in ".$base.";";
        $res = PdoPhpAdmin::$myPdo->query($req); 
        $tabs = $res->fetchAll();
        return $tabs;
    }

    public function show_column($tab)
    {
        $req = "SHOW COLUMNS FROM ".$tab.";";
        $res = PdoPhpAdmin::$myPdo->query($req);
        $tabs = $res->fetchAll();
        return $tabs;
    }
    public function show_column_Spe($DB, $tab )
    {
        $req = "SELECT COLUMN_NAME as Field, COLUMN_TYPE as Type FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$DB."' AND TABLE_NAME ='".$tab."';";
        $res = PdoPhpAdmin::$myPdo->query($req);
        $tabs = $res->fetchAll();
        return $tabs;
    }
    public function show_values($DB, $tab)
    {
        $req =" SELECT * FROM ".$DB.".".$tab.";";
        $res = PdoPhpAdmin::$myPdo->query($req);
        $values = $res->fetchAll();
        return $values;
    }
    
    public function create_table($name, $nameTab)
    {
        $req="use ".$name."; CREATE TABLE ".$nameTab." ( id INT PRIMARY KEY NOT NULL);";
        PdoPhpAdmin::$myPdo->prepare($req)->execute();
    }

    public function drop_table($nameDB, $nameTab)
    {
        $req = "DROP TABLE ".$nameDB.".".$nameTab.";";
        PdoPhpAdmin::$myPdo->prepare($req)->execute();
    }
    public function creaBdd($name)
    {
        $requete = "CREATE DATABASE IF NOT EXISTS `".$name."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
        PdoPhpAdmin::$myPdo->prepare($requete)->execute();
        if(PdoPhpAdmin::$myPdo) {
            return true;
        } else {
            return false;
        }
    }

    public function modifBdd($oldName, $newName)
    {
        $new = $this->creaBdd($newName);
        if($new) {
            $all_tables = $this->show_tab($oldName);
            $i = 0;
            $nb =  count($all_tables);
            while( $nb > $i) {
                PdoPhpAdmin::$myPdo->prepare("RENAME TABLES ".$oldName.".".$all_tables[$i][0]." TO ".$newName.".".$all_tables[$i][0].";")->execute();
                $i++;
            }
            if(PdoPhpAdmin::$myPdo) {
                $this->suppBdd($oldName);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function suppBdd($name)
    {
        $req = "DROP DATABASE IF EXISTS ".$name.";";
        PdoPhpAdmin::$myPdo->prepare($req)->execute();
        if(PdoPhpAdmin::$myPdo) {
            return true;
        } else {
            return false;
        }
        
    }

    public function getnbTable($name)
    {
        $all_tables = $this->show_tab($name);
        if($all_tables) {
            $nb =  count($all_tables);
            return $nb;
        } else {
            return 0;
        }

    }

    public function getDate($namebdd)
    {
        $req = "SELECT create_time FROM information_schema.tables where table_schema = '".$namebdd."' Group by TABLE_SCHEMA;";
        $res =  PdoPhpAdmin::$myPdo->query($req);
        $data = $res->fetch();
          if($data) {
            return $data[0];
        } else {
            return 0;
            }
        
    }

    public function getMemory($namebdd)
    {
        $reqKB = "SELECT ROUND(SUM(data_length + index_length) / 1024 , 2) FROM information_schema.tables WHERE table_schema='".$namebdd."' GROUP BY TABLE_SCHEMA;";
        $res = PdoPhpAdmin::$myPdo->query($reqKB);
        $data = $res->fetch();
        if($data) {
            return $data[0];
        } else {
            return 0;
        }
    }

    public function change_name_tab($nameDb, $oldNameTab, $newNameTab)
    {
        $req = "use ".$nameDb."; RENAME TABLE `".$oldNameTab."` TO `".$newNameTab."`;";
        $res = PdoPhpAdmin::$myPdo->query($req);
        if($res)
            {
                return 1;
            }
        else
            {
                return 0;
            }
    }

    public function add_column($nameDb, $tab, $nameCol, $type)
    {
        $req = "use ".$nameDb."; ALTER TABLE ".$tab." ADD COLUMN ".$nameCol." ".$type.";";
        $res = PdoPhpAdmin::$myPdo->query($req);
    }

    public function drop_column($nameDb, $Tab, $nameCol)
    {
        $req = "use ".$nameDb."; ALTER TABLE ".$Tab." DROP COLUMN ".$nameCol.";";
        $res = PdoPhpAdmin::$myPdo->query($req);
        
    }

    public function change_column($nameDb, $tab, $oldNameC, $newNameC, $type)
    {
        $req = "use ".$nameDb."; ALTER TABLE ".$tab." CHANGE ".$oldNameC." ".$newNameC." ".$type.";";
        $res = PdoPhpAdmin::$myPdo->query($req);
    }

    public function count_row($nameDB, $tab)
    {
        $req="select TABLE_ROWS from information_schema.TABLES where TABLE_SCHEMA = '".$nameDB."' AND table_name = '".$tab."';";
        $res = PdoPhpAdmin::$myPdo->query($req);
        $nb = $res->fetch();
        return $nb[0];
    }

    public function insert($nameDB, $tab, $values)
    {
        $req="INSERT INTO ".$nameDB.".".$tab." VALUES (";
        $vals = count($values[0]);
        $reqNext="";
        foreach($values[0] as $key => $value)
            {
                $reqNext = $reqNext."'".$value;
                $reqNext = $reqNext."'";
                if($key + 1 < $vals)
                $reqNext = $reqNext.",";
            }
        $request = $req.$reqNext.");";
        PdoPhpAdmin::$myPdo->prepare($request)->execute();
    }

    public function uptdate($nameDB, $nameTab, $cols, $values, $id)
    {
        $req="UPDATE ".$nameDB.".".$nameTab." SET ";
        $vals = count($values[0]);
        $col = count($cols);
        $reqCol="";
        $reqNext="";
        foreach($cols[0] as $key => $col)
            {
                
             foreach($values[0] as $key => $value)
                 {
                    $reqNext = $col;
                    $reqNext = $reqNext." = '".$value;
                    $reqNext = $reqNext."'";
                    if($key + 1 < $vals)
                        $reqNext = $reqNext.",";
                }
        $request = $req.$reqNext.";";
            }
        PdoPhpAdmin::$myPdo->prepare($request)->execute();
        
    }
    public function delete($nameDB, $nameTab, $id)
    {
        $req = "DELETE FROM ".$nameDB.".".$nameTab." WHERE id=".$id.";";
        PdoPhpAdmin::$myPdo->prepare($req)->execute();
    }
    public function request($req)
    {
        $res = PdoPhpAdmin::$myPdo->prepare($req)->execute();
        return $res;

    }
 }
?>