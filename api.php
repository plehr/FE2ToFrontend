<?php
require_once("db.php");
$datab = new datab();

$pin=htmlspecialchars($_GET["apikey"]);
if ($pin == "secret")
{
    $time= htmlspecialchars($_GET["time"]);
    $descr= htmlspecialchars($_GET["descr"]);
    $datab->newMission($time, $descr);
}
?>