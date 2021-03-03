<!--Sidebar is from the website: https://codepen.io/daanvankerkom/pen/bRbKEL-->

<?php require_once 'header.php'; ?>
<?php include('./frontend/popupform.php'); ?>

<?php
$stmt = $db->query("SELECT * FROM Subject");
$subjects = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="frontend/index.js"></script>
    <script src="frontend/subject.js"></script>

</head>

<body>
<div class="container">
    <div class="sidebar-container">
        <div class="sidebar-logo" onclick="popUpNewSubject()">
            Emner
        </div>

        <?php include('frontend/popupform.php'); ?>
        <ul class="sidebar-navigation">
            <?php foreach ($subjects as $row){ ?>
            <li><a href="subject.php?course=<?= $row['idSubject'] ?>"
                    <i aria-hidden="true"></i>
                    <?php
                    echo $row['subjectCode'] . ' ' . $row['subjectTitle'];
                    ?>
                    <?php } ?>
                </a>
            </li>
        </ul>

    </div>

    <div class="content-container">
        <div class="container-fluid">
            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron" >
                    <form >
                        <label>
                            <input class="search" type="text" name="search" placeholder="Finn spørsmål..">
                        </label>
                        <a class="btnNewGroup" onclick="popUpNewGroup()"> + Ny spørsmålsgruppe</a>
                    </form>
                <?php include('frontend/popUpGroup.php'); ?>
            </div>

            <div class="jumbotron">
            <div id="firstCont">
                <h3>G</h3>

            </div>

                <div id="secondCont">
                    <ul >
                        <li><a href="#">Tester</a></li>
                        <li><a href="#">Importere</a></li>
                        <li><a href="#">Eksportere</a></li>
                        <li><a href="#">Personer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
</body>
</html>