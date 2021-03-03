<?php
require_once 'auth_pdo.php';
require_once 'src/App.php';
require_once 'src/model/Group.php';
session_start();

if(isset($_POST['submit'])){
    $groupName = $_POST['groupName'];
    $stmt = new App($db);
    $stmt->createGroup($_POST['groupName'], $_POST['Subject_idSubject']);
    $groups = $stmt ->getAllSubjectGroups();
}
?>