<?php
//
// ETNA PROJECT, 10/11/2018 by juzain_d
// SQL request
// File description:
//      ...
//
?>
<div id="containts">
        <h2>Write a SQL Request</h2>
         <form name="Return" method="post" action="../index.php?uc=manageTable&action=ConfirmSQL&name=<?php echo $nameDB; ?>">
            <textarea name="request" rows="10" cols="50">
            Write your request here.
            </textarea><br>
            <input type="submit" value="Confirm">
            <input type="reset" value="Reset">
         </form><br>
         <form name="tab" method="post" action="../index.php?uc=manageTable&action=showTable&name=<?php echo $nameDB; ?>">
             <input type="submit" name="Return" value="Return">
         </form>
</div>
    