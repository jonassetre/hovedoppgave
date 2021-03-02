<!--Popupform is from the website: https://www.w3schools.com/howto/howto_css_login_form.asp-->
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Popup Login</title>
    <link rel="stylesheet" href="../stylesheets/index.css" />
    <script src="../frontend/index.js"></script>
</head>
<body>
<div id="id01" class="modal">
    <form class="modal-content animate" action="#" method="post">
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

            <button id="button1" type="submit" >Lagre</button>
            <button id="button2" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Avbryt</button>
        </div>
    </form>
</div>
<?php
    require_once 'src/App.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $subjectCode = $_POST['subcode'];
        $subjectName = $_POST['subname'];
        if(!empty($subjectCode) && !empty($subjectName)){
            $app = new App($db);
            $app->createSubject($subjectCode, $subjectName);
        }
    }
?>
</body>
</html>