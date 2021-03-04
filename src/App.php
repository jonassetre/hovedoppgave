<?php
include_once "model/Answer.php";
include_once "model/Comment.php";
include_once "model/Group.php";
include_once "model/Question.php";
include_once "model/Score.php";
include_once "model/Subject.php";
include_once "model/Test.php";
include_once "model/User.php";
include_once "model/User_has_Subject.php";
include_once "model/UserRole.php";

include_once 'NotFoundException.php';

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

    public function redirect($msg, $destination) {
        echo "<script type='text/javascript'>alert('$msg');location='$destination';</script>";
        return 0;
    }

    public function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
        return 0;
    }

    public function createSubject($subjectCode, $subjectTitle){
        try {
            //Sjekker om et emne med valgt emnekode allerede eksisterer, om den gjør det så vis en alert og avbryt
            $stmt = self::prepare(
                'SELECT * FROM Subject
                           WHERE subjectCode=:subjectCode'
            );
            $stmt->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($rows){
                $this->redirect('Et emne med den emnekoden eksisterer allerede, vennligst benytt en annen emnekode', 'index.php');
                return -1;
            }

            //Legger til emnet i databasen
            $stmt = self::prepare(
                'INSERT INTO Subject (subjectCode, subjectTitle)
                          VALUES (:subjectCode, :subjectTitle)'
            );
            $stmt->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
            $stmt->bindParam(':subjectTitle', $subjectTitle, PDO::PARAM_STR);
            return $stmt->execute();
        } catch  (Exception $e) {
            print $e->getMessage(). PHP_EOL;
        }
    }

    public function createGroup($groupName, $id_subject){
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

    public function getAllSubjectGroups($idSubject){
        try {
            $stmt = self::prepare("SELECT * FROM Group  WHERE Subject_idSubject = :idSubject");
            $stmt->bindParam(":idSubject", $idSubject,  PDO::PARAM_INT);
            $stmt->execute();
            $i = 0;
            $groups= [];
            if ($stmt->rowCount() > 0) {
                while ($group = $stmt->fetchObject("Group")) {
                    $groups[$i++] = $group;
                }
            }
        } catch (Exception $e) {
            print  $e->getMessage(). PHP_EOL;
        }
    }

    public function getAllSubjectsOfUserById(int $User_idUser)  {
        $stmt = self::prepare(" SELECT * FROM Subject JOIN User_has_Subject 
             On Subject.idSubject =User_has_Subject.Subject_idSubject WHERE User_has_Subject.User_idUser = :User_idUser");
        $stmt->bindParam(":User_idUser", $User_idUser);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}




