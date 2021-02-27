<?php

class UserRole implements JsonSerializable
{
  private $idUserRole;
  private $userRoleTitle;
  private $isAdmin;


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getIdUserRole()
    {
        return $this->idUserRole;
    }

    /**
     * @param mixed $idUserRole
     */
    public function setIdUserRole($idUserRole)
    {
        $this->idUserRole = $idUserRole;
    }

    /**
     * @return mixed
     */
    public function getUserRoleTitle()
    {
        return $this->userRoleTitle;
    }

    /**
     * @param mixed $userRoleTitle
     */
    public function setUserRoleTitle($userRoleTitle)
    {
        $this->userRoleTitle = $userRoleTitle;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }


}