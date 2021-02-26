<?php

include_once "model/Answer.php";


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
        try {
            $stmt = self::prepare(
                'INSERT INTO Subject (subjectCode, subjectTitle)
         VALUES (:subjectCode, :subjectTitle);'
            );
            $stmt->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
            $stmt->bindParam(':subjectTitle', $subjectTitle, PDO::PARAM_STR);
            return $stmt->execute();
        } catch  (Exception $e) {
            print $e->getMessage(). PHP_EOL;
        }
    }

    public function createGroup($groupName, $id_subject): Group{
        try {
            $stmt = self::prepare("INSERT INTO `Group`(`groupName`, `Subject_idSubject`)" .
                "VALUES (:groupName, :id_subject)");
            $stmt->bindParam(":groupName", $groupName, PDO::PARAM_STR);
            $stmt->bindParam(":id_subject", $id_subject, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            print  $e->getMessage(). PHP_EOL;
        }
    }
}




