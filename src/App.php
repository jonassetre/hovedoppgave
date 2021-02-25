<?php

include_once "model/test.php";


require_once 'auth_pdo.php';

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
        $query = self::prepare(
            'INSERT INTO Subject (subjectCode, subjectTitle)
         VALUES (:subjectCode, :subjectTitle);'
        );
        $query->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
        $query->bindParam(':subjectTitle', $subjectTitle, PDO::PARAM_STR);
        $query->execute();
        return 0;
    }

    public function createGroup($groupName, $id_subject): Group{
        try {
            $stmt =self::prepare("INSERT INTO `Group`(`groupName`, `Subject_idSubject`)" .
                "VALUES (:groupName, :id_subject)");
            $stmt->bindParam(":groupName", $groupName, PDO::PARAM_STR);
            $stmt->bindParam(":id_subject", $id_subject, PDO::PARAM_INT);
            $stmt->execute();
            return 0;
        } catch (Exception $e) {
            print  $e->getMessage(). PHP_EOL;
        }
    }
}




