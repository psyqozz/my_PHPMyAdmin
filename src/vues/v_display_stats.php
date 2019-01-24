<?php
//
// ETNA PROJECT, 07/11/2018 by juzian_d
// display stats database
// File description:
//      ...
//
?>
<div id="table">
    <table border=1>
       <tr>
           <th>Name of Database</th>
           <th> Number of table</th>
           <th>Creation date</th>
           <th>Memory space KB</th>
       </tr>
       <tr>
            <td><?php echo $namebdd; ?></td>
            <td><?php echo $tables; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $memory; ?></td>
       </tr>
    </table>
</div>
