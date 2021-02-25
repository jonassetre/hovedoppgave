<?php
$servername = "kark.uit.no";
$username = "stud_v21_bachelorgrp4";
$password = "grp4Quiz21";
$dbname = "stud_v21_bachelorgrp4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
