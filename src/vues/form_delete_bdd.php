
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> MY_phpAdmin</title>
    <link href="../style/styles.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="containts">
         <h2>Delete your Database :</h2>
        <form name="bdd" method="post" action="../index.php?uc=gererBdd&action=confirmDelete"
        <p>Name of database :<select name="nameBDD"> <?php foreach($DB as $aDB): ?>
            <option value="<?php echo $aDB[0]?>" ><?php echo $aDB[0]?></option>
            <?php endforeach; ?>
          </select></p>
          <input onclick="return confirm('Are you sure ?')" type="submit"  value="Confirm">
          <input type="reset"  value="Reset">
        </form>
    </div>
   </body>
</html>

