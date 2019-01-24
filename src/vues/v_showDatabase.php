<?php
//
// ETNA PROJECT, 08/11/2018 by juzain_d
// show DB
// File description:
//      ...
//

?>

<body>
<div id="table">
        <table border=1>
          <tr>
                 <th>DataBase name</th>
          </tr>
            <?php foreach($DB as $oneDB): ?>
          <tr>
            <td><?php echo $oneDB[0]; ?></td>
          </tr>
            <?php endforeach; ?>
        </table><br>
    </div>
</body>

    