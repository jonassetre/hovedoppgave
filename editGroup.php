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
$method = $_SERVER['REQUEST_METHOD'];
if(isset($_POST['btn1'])) {
    $idGroup = $_GET['id'];
    $groupName = $_POST['groupName'];
    if (!empty($groupName)) {
        $app->editGroup($idGroup, $groupName);
    }
}

if (isset($_GET['id'])) {
    $idGroup = $_GET['id'];
    $data = $app->getGroupByGroupId($idGroup);
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
    <h2>Oppdater gruppe</h2>
    <form id="editSubject" class="modal-content-subject" action="" method="post">
        <div class="containerSubject">

            <label for="groupName"><b>Gruppenavn</b></label>
            <label>
                <input type="text" placeholder="Skriv gruppenavn " name=groupName value="<?php echo $data['groupName']?>" " required>

            </label>
            <br>

            <button id="btn1" type="submit" name="btn1" >Lagre</button>

        </div>
    </form>
</div>
<?php require_once 'footer.php'; ?>

</body>
</html>