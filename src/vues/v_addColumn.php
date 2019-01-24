<?php
//
// ETNA PROJECT, 07/11/2018 by juzain_d
// add column
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
        <h2>Add column in your table : </h2>
        <form name="tab" method="POST" action="../index.php?uc=manageTable&action=confirmAdd&name=<?php echo $nameDB; ?>">
            <p> Current Table name :<input type="text" name="nameTab" value="<?php echo $nameTab; ?>">
            <p> Name of column : <input type="text" name="nameCol"> </p>
            <p>Types : <select name="type"> 
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
    
