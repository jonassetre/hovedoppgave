<!--Sidebar is from the website: https://codepen.io/daanvankerkom/pen/bRbKEL-->
<?php
session_start();
require_once 'header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}?>
<?php
require_once 'src/App.php';
$method = $_SERVER['REQUEST_METHOD'];
if(isset($_POST['update'])){
    $subjectCode = $_POST['subjectCode'];
    $subjectTitle = $_POST['subjectTitle'];
    $idSubject = $_GET['course'];
    if(!empty($subjectCode) && !empty($subjectTitle)){
        $app->updateSubject($idSubject, $subjectCode,$subjectTitle);
    }
}?>
<?php
require_once 'src/App.php';
$method = $_SERVER['REQUEST_METHOD'];
if (isset($_GET['course'])) {
    $idSubject = $_GET['course'];
    $data = $app->getSubjectBySubjectId($idSubject);
}
?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>

</head>

<body>
<div class="container">
    <div class="questionTop">
        <a class="backToGroup" onclick="window.location.href='subject.php';"> Gå til emner</a>
    </div>
    <h2>Oppdatere emne</h2>
    <form id="createSubject" class="modal-content-subject" action= "" method="post">
        <div class="containerSubject">

            <label for="subjectCode"><b>Emnekode</b></label>
            <label>
                <input type="text" placeholder="Skriv emnekode" value="<?php echo $data['subjectCode'] ?>" name="subjectCode" required>
            </label>
            <br>

            <label for="subjectTitle"><b>Emnenavn</b></label>
            <label>
                <input type="text" placeholder="Skriv emnenavn" value="<?php echo $data['subjectTitle'] ?>" name="subjectTitle" required>
            </label>
            <button id="update" type="submit" value="update" name="update" >Lagre</button>

        </div>
    </form>

</div>
<?php require_once 'footer.php'; ?>

</body>
</html>