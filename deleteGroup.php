<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete group</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
</head>
<body>


<?php
require_once 'src/App.php';
$method = $_SERVER['REQUEST_METHOD'];
if(isset($_POST['btn1'])) {
    $idGroup = $_GET['course'];
    $groupName = $_POST['groupName'];
    if (!empty($groupName)) {
        $app->deleteGroup($idGroup);
    }
}

if (isset($_GET['course'])) {
    $idGroup = $_GET['course'];
    $data = $app->getGroupByGroupId($idGroup);
}


?>

<div id="id03" class="modal">
    <form id="deleteGroup" class="modal-content animate" action="" method="POST">
        <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="containerPopup">
            <h2>Er du sikker at du vil slette denne gruppen?</h2>
            <label for="groupName"><b>Gruppenavn</b></label>
            <label>
                <input type="text" id="groupName" name="groupName" value="<?php echo $_POST['groupName']?>" required>
                <?php print_r($data['groupName']) ?>
            </label>
            <input type="hidden" id="Subject_idSubject" name="Subject_idSubject"
                   value="<?php echo $_GET['id']?>">
            <button id="btn1" type="submit" name="btn1" >Lagre</button>
            <button id="btn2" type="button"  name="btn2" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Avbryt</button>
        </div>


    </form>

</div>

</body>
