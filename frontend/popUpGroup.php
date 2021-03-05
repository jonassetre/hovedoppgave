<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create group</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
    <script src="../frontend/subject.js"></script>

</head>
<body>


<?php
require_once 'src/App.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    }
    $User_idUser = $_SESSION['user_id'];
    $subjectsOfUserById = $app->getAllSubjectsOfUserById($User_idUser);
    if (isset($_POST['btn1'])) {
        if (isset($_POST['groupName']) && isset($_GET['course'])) {
            $groupName = $_POST['groupName'];
            $subjectId = $_GET['course'];
            $app = new App($db);
            $app->createGroup($groupName,$subjectId);
        }
    }
}
?>

<div id="id02" class="modal">
<form id="createGroup" class="modal-content animate" action="./subject.php" method="POST">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="containerPopup">
        <h2>Ny gruppe</h2>
        <label for="groupName"><b>Gruppenavn</b></label>
        <label>
            <input type="text" id="groupName" placeholder="Skriv gruppenavn" name="groupName" required>
        </label>
        <input type="hidden" id="Subject_idSubject" name="Subject_idSubject"
               value="<?php echo $_GET['course']?>">
        <button id="btn1" type="submit" name="btn1" >Lagre</button>
        <button id="btn2" type="button"  name="btn2" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Avbryt</button>
    </div>
</form>

</div>

</body>

