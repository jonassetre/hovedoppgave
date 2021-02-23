<?php

$host = "kark.uit.no";
$dbname = "stud_v21_bachelorgrp4";
$username = "stud_v21_bachelorgrp4";
$password = "grp4Quiz21";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
catch(PDOException $e) {
    print($e->getMessage());
}
?>