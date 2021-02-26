<?php

class Subject implements JsonSerializable
{
  private $idSubject;
  private $subjectCode;
  private $subjectTitle;


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getIdSubject()
    {
        return $this->idSubject;
    }

    /**
     * @param mixed $idSubject
     */
    public function setIdSubject($idSubject)
    {
        $this->idSubject = $idSubject;
    }

    /**
     * @return mixed
     */
    public function getSubjectCode()
    {
        return $this->subjectCode;
    }

    /**
     * @param mixed $subjectCode
     */
    public function setSubjectCode($subjectCode)
    {
        $this->subjectCode = $subjectCode;
    }

    /**
     * @return mixed
     */
    public function getSubjectTitle()
    {
        return $this->subjectTitle;
    }

    /**
     * @param mixed $subjectTitle
     */
    public function setSubjectTitle($subjectTitle)
    {
        $this->subjectTitle = $subjectTitle;
    }

}