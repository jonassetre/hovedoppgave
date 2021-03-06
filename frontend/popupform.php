<!--Popupform is from the website: https://www.w3schools.com/howto/howto_css_login_form.asp-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Popup Login</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
</head>
<body>
<div id="id01" class="modal">
    <form id="createSubject"class="modal-content animate" action="#" method="post">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="containerPopup">
            <h2>Nytt emne</h2>
            <label for="subcode"><b>Emnekode</b></label>
            <label>
                <input type="text" placeholder="Skriv emnekode" name="subcode" required>
            </label>

            <label for="subname"><b>Emnenavn</b></label>
            <label>
                <input type="text" placeholder="Skriv emnenavn" name="subname" required>
            </label>

            <button id="button1" type="submit" name="button1" >Lagre</button>
            <button id="button2" type="button" name="button2" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Avbryt</button>
        </div>
    </form>
</div>
<?php
    require_once 'src/App.php';

    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    }

    if (isset($_POST['button1'])){
        $subjectCode = $_POST['subcode'];
        $subjectName = $_POST['subname'];
        if(!empty($subjectCode) && !empty($subjectName)){
            $app->createSubject($subjectCode, $subjectName, $_SESSION['user_id']);
        }
    }
?>
</body>
</html>