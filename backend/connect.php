<?php
$host = "kark.uit.no";
$databaseName = "stud_v21_bachelorgrp4";
$userName = "stud_v21_bachelorgrp4";
$password = "grp4Quiz21";

try {
    $db = new PDO("mysql:host=$host;dbname=$databaseName", $userName, $password);
} catch (PDOException $pe) {
    die("Could not connect to the database $databaseName :" . $pe->getMessage());
}