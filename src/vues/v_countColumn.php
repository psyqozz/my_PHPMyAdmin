<?php
//
// ETNA PROJECT, 08/11/2018 by juzain_d
// count column
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
            <h2>Number of rows : </h2>
            <form name="col" method="post" action="../index.php?uc=manageTable&action=numOfRow&name=<?php echo $nameDB;?>">
                <p> Current Table name :<input type="text" name="nameTab" value="<?php echo $nameTab; ?>"></p>
                <input type="submit" name="confirm" value="Confirm">
                <input type="reset" name="reset" value="Reset">
            </form>
       </div>
    </body>
</html>

   