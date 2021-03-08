<!--Sidebar is from the website: https://codepen.io/daanvankerkom/pen/bRbKEL-->
<?php
session_start();
require_once 'header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} ?>

<?php
require_once 'src/App.php';
if (isset($_POST['button1'])){
    $subjectCode = $_POST['subcode'];
    $subjectName = $_POST['subname'];
    if(!empty($subjectCode) && !empty($subjectName)){
        $app->createSubject($subjectCode, $subjectName, $_SESSION['user_id']);
    }
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="frontend/index.js"></script>
</head>

<body>
<div class="container">
    <div class="questionTop">
        <a class="backToGroup" onclick="window.location.href='subject.php';"> Gå til emner</a>
    </div>
    <h2>Nytt emne</h2>
    <form id="createSubject" class="modal-content-subject" action="" method="post">
        <div class="containerSubject">

            <label for="subcode"><b>Emnekode</b></label>
            <label>
                <input type="text" placeholder="Skriv emnekode" name="subcode" required>
            </label>
            <br>

            <label for="subname"><b>Emnenavn</b></label>
            <label>
                <input type="text" placeholder="Skriv emnenavn" name="subname" required>
            </label>

            <button id="button1" type="submit" name="button1" >Lagre</button>

               </div>
    </form>
</div>
<?php require_once 'footer.php'; ?>

</body>
</html>