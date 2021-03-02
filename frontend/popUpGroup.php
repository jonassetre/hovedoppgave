
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create group</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
    <script src="../frontend/index.js"></script>
    <script src="../frontend/subject.js"></script>
</head>
<body>
<div id="id02" class="modal">
<form id="createGroup" class="modal-content animate" action="#" method="POST">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="containerPopup">
        <h2>Ny gruppe</h2>
        <label for="groupName"><b>Gruppenavn</b></label>
        <label>
            <input type="text" id="groupName" placeholder="Skriv gruppenavn" name="groupName" required>
        </label>
        <label><input type="" name="Subject_idSubject"></label>
        <button id="btn1" type="submit" name="btn1" >Lagre</button>
        <button id="btn2" type="button"  name="btn2" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Avbryt</button>
    </div>
</form>

</div>


<?php
require_once 'src/App.php';
if (isset($_POST['btn1'])){
    $groupName = $_POST['groupName'];
    $subjectId = $_POST['Subject_idSubject'];
    if(!empty($groupName) && !empty($subjectId)){
        $app = new App($db);
        $app->createGroup($groupName, $subjectId);
    }
}
?>
</body>

