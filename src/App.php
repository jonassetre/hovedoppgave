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

    #region Miscellaneous
    public function redirect($msg, $destination) {
        echo "<script type='text/javascript'>alert('$msg');location='$destination';</script>";
        return 0;
    }

    public function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
        return 0;
    }
    #endregion


    #region Answer
    #endregion

    #region Comment
    #endregion

    #region Group
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

        $stmt = self::prepare("SELECT * FROM `Group`  WHERE `Subject_idSubject` =:Subject_idSubject");
        $stmt->bindParam(":Subject_idSubject", $idSubject, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getGroupByGroupId($idGroup){
        try {
            $stmt = self::prepare("select * from `Group` where idGroup = :idGroup");
            $stmt->bindParam(":idGroup", $idGroup, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();

        } catch (InvalidArgumentException $ex) {
            print $ex->getMessage() . PHP_EOL;
        }
    }

    public function editGroup($idGroup, $groupName)
    {
        try {
            $stmt = self::prepare("UPDATE `Group` SET `groupName`=:groupName where idGroup=:idGroup ");
            $stmt->bindParam(":idGroup", $idGroup, PDO::PARAM_INT);
            $stmt->bindParam(":groupName", $groupName, PDO::PARAM_STR);

            $stmt->execute();
        } catch (InvalidArgumentException $ex) {
            print $ex->getMessage() . PHP_EOL;
        }
    }

    public function deleteGroup(int $idGroup) : bool {
        $stmt = self::prepare("DELETE FROM Group WHERE idGroup = :idGroup");
        $stmt->bindParam(":idGroup", $idGroup, PDO::PARAM_INT);
        return $stmt->execute();
    }
    #endregion

    #region Question
    public function createQuestion($questContent, $diffDegree, $tag, $score, $Group_idGroup){
        try {
            $stmt = self::prepare("INSERT INTO Question (questContent, diff_degree, Tag, Score, GroupName_idGroup) VALUES (:questContent, :diffDegree, :tag, :score, :Group_idGroup)");
            $stmt->bindParam(":questContent", $questContent, PDO::PARAM_STR);
            $stmt->bindParam(":diffDegree", $diffDegree, PDO::PARAM_STR);
            $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
            $stmt->bindParam(":score", $score, PDO::PARAM_INT);
            $stmt->bindParam(":Group_idGroup", $Group_idGroup, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (InvalidArgumentException $ex) {
            print $ex->getMessage() . PHP_EOL;
        }
    }

    public function getAllQuestionByGroupId($idGroup){

        $stmt = self::prepare("SELECT * FROM `Question`  WHERE `GroupName_idGroup` =:GroupName_idGroup");
        $stmt->bindParam(":GroupName_idGroup", $idGroup, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    #endregion

    #region Score
    #endregion

    #region Subject
    public function subjectExists($subjectCode){
        //Sjekker om et emne med valgt emnekode allerede eksisterer
        $stmt = self::prepare('SELECT * FROM Subject WHERE subjectCode=:subjectCode');
        $stmt->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($rows)
            return true;
        else
            return false;
    }

    public function createSubject($subjectCode, $subjectTitle, $userId){
        try {
            //Viser alert og redirecter om emnekoden allerede er i bruk
            if($this->subjectExists($subjectCode)){
                $this->redirect('Et emne med den emnekoden eksisterer allerede, vennligst benytt en annen emnekode', 'index.php');
                return -1;
            }

            //Legger til emnet i databasen
            $stmt = self::prepare('INSERT INTO Subject (subjectCode, subjectTitle) VALUES (:subjectCode, :subjectTitle)');
            $stmt->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
            $stmt->bindParam(':subjectTitle', $subjectTitle, PDO::PARAM_STR);
            $stmt->execute();

            //Gjør pålogget bruker til første medlem av emnet ved å legge de til i User_has_Subject tabellen, owner?
            $subjectId = $this->getUserIdFromSubjectCode($subjectCode);
            $stmt = self::prepare('INSERT INTO User_has_Subject (User_idUser, Subject_idSubject) VALUES (:userId, :subjectId)');
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':subjectId', $subjectId, PDO::PARAM_INT);
            $stmt->execute();
        } catch  (Exception $e) {
            print $e->getMessage(). PHP_EOL;
        }
    }

    public function getSubjectBySubjectId($idSubject){
        try {
            $stmt = self::prepare("select * from `Subject` where idSubject = :idSubject");
            $stmt->bindParam(":idSubject", $idSubject, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();

        } catch (InvalidArgumentException $ex) {
            print $ex->getMessage() . PHP_EOL;
        }
    }

    public function updateSubject(int $idSubject, string $subjectCode, string $subjectTitle) {
        $stmt = self::prepare("UPDATE `Subject` SET subjectCode = :subjectCode, subjectTitle = :subjectTitle WHERE idSubject = :idSubject");
        $stmt->bindParam(":subjectCode", $subjectCode, PDO::PARAM_STR);
        $stmt->bindParam(":subjectTitle", $subjectTitle, PDO::PARAM_STR);
        $stmt->bindParam(":idSubject", $idSubject, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteSubject(int $idSubject) : bool {
        $stmt = self::prepare("DELETE FROM Subject WHERE idSubject = :idSubject");
        $stmt->bindParam(":idSubject", $idSubject, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getUserIdFromSubjectCode($subjectCode){
        $stmt = self::prepare('SELECT idSubject FROM Subject WHERE subjectCode=:subjectCode');
        $stmt->bindParam(':subjectCode', $subjectCode, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    #endregion

    #region Test
    #endregion

    #region User
    #endregion

    #region User_has_Subject
    public function countSubjectsOfUser(int $User_idUser)  {
        $stmt = self::prepare("SELECT COUNT(*) AS num_rows FROM User_has_Subject WHERE `User_idUser` = :User_idUser");
        $stmt->bindParam(":User_idUser", $User_idUser);
        $stmt -> execute();
        $count = (int)$stmt->fetchColumn();
        return $count;
    }

    public function getAllSubjectsOfUserById(int $User_idUser)  {
        $stmt = self::prepare(" SELECT * FROM Subject JOIN User_has_Subject 
             On Subject.idSubject =User_has_Subject.Subject_idSubject WHERE User_has_Subject.User_idUser = :User_idUser");
        $stmt->bindParam(":User_idUser", $User_idUser);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    #endregion

    #region UserRole
    #endregion











}




