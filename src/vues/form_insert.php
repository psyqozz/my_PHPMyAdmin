<?php
//
// ETNA PROJECT, 08/11/2018 by juzain_d
// SQL insert into tab
// File description:
//      ...
//

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
            <title> MY_phpAdmin</title>
          </head>
          <body>
            <div id="containts">
    <form name="tab" method="POST" action="../index.php?uc=manageTable&action=confirmInsert&name=<?php echo $nameDB; ?>&nameTab=<?php echo $nameTab; ?>">
        <h2>Insert values in your table <?php echo $nameTab; ?> : </h2>
        <div id="table">
            <table border=1>
            <tr>
                <th> Columns </th>
                <th> Type</th>
                <th> Values</th>
            </tr>
            <tr>
                <?php   foreach($cols as $oneCol): ?>
                <tr><td><?php echo $oneCol['Field']; ?></td>
                    <td><?php echo $oneCol['Type']; ?></td>
                    <td><input type="text" name="Values[]"></td>
                        <?php  endforeach; ?>
            </tr>
            </table>
        <p> Current Table name : <?php echo $nameTab; ?></p>
        <input type="submit" name="confirm" value="Confirm">
         <input type="reset" name="reset" value="Reset">
      </form>
      </div>
   </body>
</html>


    