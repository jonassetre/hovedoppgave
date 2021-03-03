<?php
session_start();
require_once 'header.php';

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="./frontend/index.js"></script>
</head>

<body>
<div class="container">
    <img src="mango-matter-1Ms3Zsb1v7g-unsplash.jpg" alt="Home">
    <h1>Velkommen til UiTs spørsmålsbank</h1>

    <a class="example_b" onclick="popUpNewSubject()"> + Nytt emne</a>
    <?php include('./frontend/popupform.php'); ?>
</div>
<?php require_once 'footer.php'; ?>
</body>
</html>