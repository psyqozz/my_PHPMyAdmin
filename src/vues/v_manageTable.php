<?php
//
// ETNA PROJECT, 07/11/2018 by juzain_d
// show option for table
// File description:
//      ...
//
?>
<div id="containts">
    <h2>Edit Your Database easily</h2>
    <div id="table">
        <table border=1>
        <tr>
             <th>Name of Tables</th>
             <th> Edit name</th>
             <th> Delete table</th>
             <th> Add new column</th>
             <th> Edit column</th>
             <th> Delete column</th>
             <th> Rows</th>
             <th> SQL Request</th>
        </tr>
            <?php foreach($tabs as $oneTabs): ?>
        <tr>
            <td><?php echo $oneTabs[0]; ?></td>
            <td> <a href="index.php?uc=manageTable&action=editTable&name=<?php echo $nameDB; ?>&nameTab=<?php echo $oneTabs[0]; ?>"> <img src="images/change.jpg" title="Edit name table"> </a></td>
    
            <td> <a href="index.php?uc=manageTable&action=dropTable&name=<?php echo $nameDB; ?>&nameTab=<?php echo $oneTabs[0]; ?>" onclick="return confirm('Aare you sure ?')"><img src="images/delete.jpg" title="Delete table"> </a></td>
    
             <td> <a href="index.php?uc=manageTable&action=AddColumn&name=<?php echo $nameDB; ?>&nameTab=<?php echo $oneTabs[0]; ?>"> <img src="images/add.jpg" title="Add column"> </a></td>
    
            <td> <a href="index.php?uc=manageTable&action=editColumn&name=<?php echo $nameDB; ?>&nameTab=<?php echo $oneTabs[0]; ?>">  <img src="images/edit.jpg" title="Edit column"> </a></td>

            <td> <a href="index.php?uc=manageTable&action=dropColumn&name=<?php echo $nameDB; ?>&nameTab=<?php echo $oneTabs[0]; ?>"> <img src="images/trash.jpg" title="Delete column"> </a></td>
        
            <td> <a href="index.php?uc=manageTable&action=countRows&name=<?php echo $nameDB; ?>&nameTab=<?php echo $oneTabs[0]; ?>"> <img src="images/rows.jpg" title="Count Rows">  </a></td>
            <td> <a href="index.php?uc=manageTable&action=request&name=<?php echo $nameDB; ?>&nameTab=<?php echo $oneTabs[0]; ?>"> <img src="images/request.jpg" title="SQL Request" </a></td>
         </tr>
         <?php endforeach; ?>
    </table>
    </div>
    <p><a href="index.php?uc=manageTable&action=CreateTable&name=<?php echo $nameDB;?>"> <img src="images/add.jpg" title="Create table"></a> <- Create table
    <a href="index.php?uc=manageTable&action=WriteSQL&name=<?php echo $nameDB;?>"> <img src= "images/SQL.jpg" title="Create table"></a> <- Write A SQL request </p>
    </p>
    
    <form name="return" method="post" action="../index.php?uc=manageTable&action=chooseDatabase&name=<?php echo $name;?>"><br>
        <input type="submit" value="return">
    </form>
</div>
