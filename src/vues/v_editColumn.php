<?php
//
// ETNA PROJECT, 08/11/2018 by juzain_d
// ...
// File description:
//      ...
//

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> MY_phpAdmin</title>
    <link href="../style/styles.css" rel="stylesheet" type="text/css" />
   </head>
      <body>
        <div id="containts">
            <h2>Edit your Table column: </h2>
            <form name="col" method="post" action="../index.php?uc=manageTable&action=confirmEditCol&name=<?php echo $nameDB;?>">
                <p> Current Table name :<input type="text" name="nameTab" value="<?php echo $nameTab; ?>">
                <p> Old name Column : <select name="oldNameCol"> <?php foreach($cols as $aCols): ?>
                    <option value="<?php echo $aCols[0]?>" ><?php echo $aCols[0]?></option>
                    <?php endforeach; ?>
                </select></p>
                <p> New name of column : <input type="text" name="newNameCol"> </p>
                <p> Type : <select name="type">
                    <option value="int"> int</option>
                    <option value="char"> char</option>
                    <option value="varchar(128)"> varchar</option>
                </select></p>
              <input type="submit" name="confirm" value="Confirm">
              <input type="reset" name="reset" value="Reset">
        </form>
        </div>
       </body>
</html>


    