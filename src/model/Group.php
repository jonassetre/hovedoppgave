<?php

class Group implements JsonSerializable
{
      private $idGroup;
      private $groupName;
      private $subjectId;

      public function jsonSerialize()
      {
          return get_object_vars($this);
      }


    public function getIdGroup()
    {
        return htmlspecialchars($this->idGroup);
    }


    public function setIdGroup($idGroup)
    {
        $this->idGroup = $idGroup;
    }


    public function getGroupName()
    {
        return htmlspecialchars($this->groupName);
    }

    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    public function getSubjectId()
    {
        return $this->subjectId;
    }

    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }
}
?>