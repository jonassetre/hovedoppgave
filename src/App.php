<?php
require_once "model/Group.php";

class App{
    private $dbase;
    public function __construct($dbase){
        $this->dbase = $dbase;
    }

    public function getDBase()
    {
        return $this->dbase;
    }
    public function createGroup($groupName, $id_subject): Group{
        try {
            $stmt = self::prepare("INSERT INTO `Group`(`groupName`, `Subject_idSubject`)" .
                "VALUES (:groupName, :id_subject)");
            $stmt->bindParam(":groupName", $groupName, PDO::PARAM_STR);
            $stmt->bindParam(":id_subject", $id_subject, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            print  $e->getMessage(). PHP_EOL;
        }
    }
}