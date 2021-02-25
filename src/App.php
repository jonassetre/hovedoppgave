<?php

include_once "model/test.php";

require_once '../backend/connect.php';

class App
{
    static $db;
    
    public function __construct(PDO $db) {
        self::$db = $db;
    }

    public static function prepare(string $statement) : PDOStatement {
        return self::$db->prepare($statement);
    }

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
}




