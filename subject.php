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
$User_idUser = $_SESSION['user_id'];
$subjectsOfUserById = $app->getAllSubjectsOfUserById($User_idUser);
?>

<?php
$method = $_SERVER['REQUEST_METHOD'];
$idSubject = $_GET['course'];
$subjectsById = $app->getSubjectBySubjectId($idSubject);
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Header</title>
    <script src="frontend/index.js"></script>
    <script src="frontend/subject.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="container">
    <div class="sidebar-container">
        <div class="sidebar-logo" onclick="window.location.href='createSubject.php';">
            Emner
        </div>

        <ul class="sidebar-navigation">
            <?php foreach ($subjectsOfUserById

            as $row) { ?>
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
            <div class="jumbotron">
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
                    <div class="example-1">
                        <a href="editSubject.php?course=<?= $subjectsById['idSubject'] ?>"><strong><?php echo $subjectsById['subjectCode'] . ' ' . $subjectsById['subjectTitle']; ?>
                        </a>
                    </div>

                    <?php
                    if (isset($_GET['course'])) {
                    $groups = $app->getAllSubjectGroups($_GET['course']);
                    if (!empty($groups)){ ?>

                    <table id="tblData">

                        <tr>
                            <?php foreach ($groups

                            as $group){ ?>
                            <td style="width: 5%;"><input type="checkbox"/></td>
                            <td style="color: #5e97b0; width: 60%; " onclick="a('row1')">
                               <?php echo $group['groupName']; ?>
                            </td>
                            <td style="width: 20%;">  <a class="btnNewQuestion" onclick="window.location.href='createQuestion.php';"> + Ny spørsmål</a>
                            </td>
                            <td style="width: 15%;">
                                <a class="edit" title="Redigere  denne gruppe" data-toggle="tooltip"><i class="material-icons" onclick="window.location.href='createGroup.php';">&#xE254;</i></a>
                                <a class="delete" title="Slette denne gruppe" data-toggle="tooltip"><i class="material-icons" onclick="">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr id="row1" style="DISPLAY: none">
                            <td colSpan=4><table class="small_text">

                                    <tr>
                                        <td style="width: 5%;"><input type="checkbox"/></td>
                                        <td style="width: 60%;">Innehold</td>
                                        <td style="width: 10%;">1 poeng</td>
                                        <td style="width: 11%;">Middels</td>
                                        <td style="width: 14%;">
                                            <a class="editQ" title="Redigere  denne spørsmål" data-toggle="tooltip"><i class="material-icons" onclick="window.location.href='createGroup.php';">&#xE254;</i></a>
                                            <a class="deleteQ" title="Slette denne spørsmål" data-toggle="tooltip"><i class="material-icons" onclick="">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                </table></td>
                        </tr>

                        <?php }
                        }
                        } ?>
                    </table>
                </div>


                <div id="secondCont">
                    <ul>
                        <li><a href="#">Tester</a></li>
                        <li><a href="#">Importere</a></li>
                        <li><a href="#">Eksportere</a></li>
                        <li><a href="editSubject.php?course=<?= $subjectsById['idSubject'] ?>">Personer</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
<script>
    $(function(){
        $('tr:visible').click(function(){
            $(this).next().toggle()
        })
    })
</script>
</body>
</html>