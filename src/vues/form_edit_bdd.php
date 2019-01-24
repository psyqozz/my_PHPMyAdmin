<?php
//
// ETNA PROJECT, 07/11/2018 by juzain_d
// form edit
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
        <h2>Edit your Database: </h2>
        <form name="bdd" method="post" action="../index.php?uc=gererBdd&action=confirmEdit"
            <p> Current name :<select name="oldName"> <?php foreach($DB as $aDB): ?>
            <option value="<?php echo $aDB[0]?>"> <?php echo $aDB[0]?></option>
            <?php endforeach; ?>
            </select></p>
            <p> New name : <input type="text" name="newName"/> </p></br>
            <input type="submit" name="confirm" value="Confirm">
             <input type="reset" name="reset" value="Reset">
        </form>
    </div>
   </body>
</html>
