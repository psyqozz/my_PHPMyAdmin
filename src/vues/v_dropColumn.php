<?php
//
// ETNA PROJECT, 08/11/2018 by juzain_d
// drop column
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
            <h2>Drop column in your table : </h2>
            <form name="tab" method="POST" action="../index.php?uc=manageTable&action=confirmDrop&name=<?php echo $nameDB; ?>">
                <p> Current Table name :<input type="text" name="nameTab" value="<?php echo $nameTab; ?>"></p>
                 <p>Name of column : <select name="nameCol"> <?php foreach($cols as $aCols): ?>
                 <option value="<?php echo $aCols[0]?>" ><?php echo $aCols[0]?></option>
                 <?php endforeach; ?>
                 </select></p>
                  <input onclick="return confirm('Are you sure ?')" type="submit"  value="Confirm">
                  <input type="reset" name="reset" value="Reset">
            </form>
            </div>
    </body>
 </html>
