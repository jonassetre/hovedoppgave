<?php
require_once '../backend/connect.php';

function insertSubject($subjectCode, $subjectTitle){
    $query = $db->prepare(
        'INSERT INTO Subject (subjectCode, subjectTitle)
         VALUES (:subjectCode, :subjectTitle);'
    );
    $query->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
    $query->bindParam(':subjectTitle', $subjectTitle, PDO::PARAM_STR);
    $query->execute();
    return 0;
}


