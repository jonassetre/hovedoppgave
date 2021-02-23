<?php

class  Group {
      private $idGroup;
      private $groupName;


    public function getIdGroup()
    {
        return htmlspecialchars($this->idGroup);
    }


    public function setIdGroup($idGroup): void
    {
        $this->idGroup = $idGroup;
    }


    public function getGroupName()
    {
        return htmlspecialchars($this->groupName);
    }

    public function setGroupName($groupName): void
    {
        $this->groupName = $groupName;
    }
}
?>