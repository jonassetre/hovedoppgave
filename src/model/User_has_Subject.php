<?php

class User_has_Subject implements JsonSerializable
{
  private $user_idUser;
  private $subject_idSubject;

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getUserIdUser()
    {
        return $this->user_idUser;
    }

    /**
     * @param mixed $user_idUser
     */
    public function setUserIdUser($user_idUser)
    {
        $this->user_idUser = $user_idUser;
    }

    /**
     * @return mixed
     */
    public function getSubjectIdSubject()
    {
        return $this->subject_idSubject;
    }

    /**
     * @param mixed $subject_idSubject
     */
    public function setSubjectIdSubject($subject_idSubject)
    {
        $this->subject_idSubject = $subject_idSubject;
    }


}