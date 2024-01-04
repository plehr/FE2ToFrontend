<?php
require_once("db.php");
$datab = new datab();

$pin=htmlspecialchars($_GET["apikey"]);
if ($pin == "secret")
{
    $time= htmlspecialchars($_GET["time"]);
    $descr= htmlspecialchars($_GET["descr"]);

    if (preg_match('/(suizid|unter|zug|springen|leiche)/', strtolower($descr)) )
        $descr = "Hilfeleistung";

    $datab->newMission($time, $descr);
}
?>