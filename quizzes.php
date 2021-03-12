<!--Sidebar is from the website: https://codepen.io/daanvankerkom/pen/bRbKEL-->
<?php
session_start();
require_once 'header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'src/App.php';
$User_idUser = $_SESSION['user_id'];
$subjectsOfUserById = $app->getAllSubjectsOfUserById($User_idUser);
$subjectsById = NULL;
if (isset($_GET['course'])) {
    $idSubject = $_GET['course'];
    $subjectsById = $app->getSubjectBySubjectId($idSubject);
}
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="frontend/index.js"></script>
    <script src="frontend/subject.js"></script>


<body>
<div class="container">
    <div class="sidebar-container">
    </div>

    <div class="content-container">
        <div class="container-fluid">
            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron" >
                <form>
                    <form action="" method="post">
                        <label>
                            <input class="search" type="text" name="searchterm" placeholder="Finn test..">
                            <input type="submit" name="submit" class="btnSearch" value="Søk"/>
                        </label>

                        <a class="btnNewGroup" onclick="window.location.href='subject.php?course=<?= $subjectsById['idSubject'] ?>';"> Tilbake til emner</a>
                    </form>
                </form>
            </div>

            <div class="jumbotron">
                <div id="firstCont">
                    <?php if (isset($idSubject)) { ?>
                        <div class="example-1">
                            <strong><?php echo $subjectsById['subjectCode'] . ' ' . $subjectsById['subjectTitle']; ?></strong>
                        </div>
                    <?php } ?>

                    <?php
                    $quizzes = $app->getAllTestsBySubjectId($idSubject);
                    ?>

                    <table id="tblData">
                        <?php foreach ($quizzes as $quizz){ ?>
                        <tr>

                            <td style="color: #5e97b0; width: 60%; " onclick="">
                                <?php echo $quizz['testName'] ; ?>
                            </td>
                            <?php
                            $idTest = $quizz['idTest'];
                            $countQ = $app->countQuestionsInTest($idTest);
                            ?>
                            <td style="width: 20%;"><?php echo $countQ ; ?> spørsmål</td>
                            <?php
                            $scores = $app->getMaxScoreOfTest($idTest);
                            ?>
                            <td style="width: 15%;"><?php echo $scores; ?> poeng</td>
                        </tr>

                            <?php
                        } ?>
                    </table>
                    <div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
</body>
</html>