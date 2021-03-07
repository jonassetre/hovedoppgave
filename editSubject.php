<!--Sidebar is from the website: https://codepen.io/daanvankerkom/pen/bRbKEL-->
<?php
session_start();
require_once 'header.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="frontend/index.js"></script>
    <script src="frontend/subject.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
<div class="container">

</div>
<?php require_once 'footer.php'; ?>

</body>
</html>