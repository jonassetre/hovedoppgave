<?php

include 'src/App.php';

define('DB_HOST', 'kark.uit.no');
define('DB_NAME', 'stud_v21_bachelorgrp4');
define('DB_USER', 'stud_v21_bachelorgrp4');
define('DB_PASSWORD', 'grp4Quiz21');
define('DB_PORT', 3306);

try {
  $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
    DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $app = new App($db);
} catch(PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}



