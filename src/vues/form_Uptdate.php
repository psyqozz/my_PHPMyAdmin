<?php
//
// ETNA PROJECT, 08/11/2018 by juzain_d
// SQL uptdate
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
            <form name="tab" method="POST" action="../index.php?uc=manageTable&action=confirmUptdate&name=<?php echo $nameDB; ?>&nameTab=<?php echo $nameTab; ?>">
                <h2>Updtates values in your table <?php echo $nameTab; ?> : </h2>
                <div id="table">
                    <table border=1>
                    <tr>
                        <th> Columns </th>
                        <th> Type</th>
                        <th> Values</th>
                    </tr>
                        <?php foreach($vals as $oneVal): ?>
                    <tr>
                        <?php $i = 0; foreach($cols as $oneCol): ?>
                    <tr><td><?php echo $oneCol['Field']; ?></td>
                        <td><?php echo $oneCol['Type']; ?></td>
                        <td><input type="text" value="<?php echo $oneVal[$i]; ?>" name="values[]"</td>
                        <?php  $i++;  endforeach; ?>
                        <?php endforeach; ?>
                    </tr>
                    </table>
                <input type="submit" name="confirm" value="Confirm">
                <input type="reset" name="reset" value="Reset">
            </div>
         </form>
    </body>
</html>