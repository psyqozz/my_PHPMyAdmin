<?php
//
// ETNA PROJECT, 07/11/2018 by juzain_d
// stat
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
            <h2>Choose one Database : </h2>
            <form name="bdd" method="post" action="../index.php?uc=manageTable&action=showTable"
              <p> Current name : <select name="name"> <?php foreach($DB as $aDB): ?>
              <option value="<?php echo $aDB[0]?>" ><?php echo $aDB[0]?></option>
              <?php endforeach; ?>
               </select></p>
               <input type="submit" name="confirm" value="Confirm">
               <input type="reset" name="reset" value="Reset">
            </form>
        </div>
    </body>
</html>

    