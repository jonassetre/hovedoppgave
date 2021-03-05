<!--Sidebar is from the website: https://codepen.io/daanvankerkom/pen/bRbKEL-->
<?php
session_start();
require_once 'header.php';
include ('./frontend/popupform.php');
include ('./frontend/popUpGroup.php');

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} ?>

<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $User_idUser = $_SESSION['user_id'];
    $subjectsOfUserById = $app->getAllSubjectsOfUserById($User_idUser);
} ?>

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

        <ul class="sidebar-navigation">
            <?php
            foreach ($subjectsOfUserById as $row){ ?>
            <li>
                <a href="subject.php?course=<?= $row['idSubject'] ?>">
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
                <form>
                    <label>
                        <input class="search" type="text" name="search" placeholder="Finn spørsmål..">
                    </label>
                    <a class="btnNewGroup" onclick="popUpNewGroup()"> + Ny spørsmålsgruppe</a>
                </form>
               <?php include('frontend/popUpGroup.php'); ?>
            </div>

            <div class="jumbotron">
                <div id="firstCont">
                     <h2>Groups</h2>

                <?php
                  if(isset($_GET['course'])) {
                      $groups = $app->getAllSubjectGroups($_GET['course']);
                          if(!empty($groups)){
                        foreach ($groups as $group){ ?>
                    <ul>
                <li>
                    <a href="createQuestion.php?group=<?= $group['idGroup']  ?>">
                        <i aria-hidden="true"></i>

                    <?php
                    echo $group['groupName'] ;
                    ?>
                        <?php }} }?>
                    </a>
                </li>
                    </ul>
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