<?php
require_once("db.php");
$datab = new datab();

$missions = $datab->getMissions();
?>

<table>
    <thead>
        <tr>
            <th>Datum</th>
            <th>Einsatz</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($missions as $mission) { ?>
            <tr>
                <td><?php echo date('d.m.y', $mission['timest']); ?></td>
                <td><?php echo $mission['descr']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
