<?php
//
// ETNA PROJECT, 08/11/2018 by juzain_d
// SQL request
// File description:
//      ...
//
?>
<div id="containts">
    <div id="table">
    <table border=1>
     <tr>
        <?php foreach($cols as $oneCol): ?>
        <th><?php echo $oneCol['Field']; ?></th>
        <?php endforeach; ?>
        <th> Edit</th>
        <th> Delete</th>
     </tr>
        <?php  foreach($vals as $oneVal): ?>
    <tr>
        <?php $i = 0;foreach($cols as $oneCol): ?>

        <td><?php echo $oneVal[$i]; ?></td>
        <?php $i++; endforeach; ?>
        <td><a href="index.php?uc=manageTable&action=Uptdate&name=<?php echo $nameDB; ?>&nameTab=<?php echo $nameTab; ?>&col=<?php echo $oneVal[0]; ?>">  <img src="images/edit.jpg" title="Edit values"> </a></td>

        <td> <a href="index.php?uc=manageTable&action=Delete&name=<?php echo $nameDB; ?>&nameTab=<?php echo $nameTab; ?>&col=<?php echo $oneVal[0]; ?>" onclick="return confirm('Are you sure ?');"> <img src="images/trash.jpg" title="Delete values"> </a></td>            
        <?php endforeach; ?>
    </tr>
   </table>
    <a href="index.php?uc=manageTable&action=insert&name=<?php echo $nameDB;?>&nameTab=<?php echo $nameTab; ?>"> <img src="images/add.jpg" title="Create table"></a> <- Insert </p>
     <br>
     <form name="Return" method="post" action="../index.php?uc=manageTable&action=showTable&name=<?php echo $nameDB;?>">
        <input type="submit" value="Return">
     </form>
    </div>
</div>
    