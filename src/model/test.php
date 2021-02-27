<?php

class Test implements JsonSerializable
{
  private $idTest;
  private $testName;
  private $testResult;
  private $subject_idSubject;


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getIdTest()
    {
        return $this->idTest;
    }

    /**
     * @param mixed $idTest
     */
    public function setIdTest($idTest)
    {
        $this->idTest = $idTest;
    }

    /**
     * @return mixed
     */
    public function getTestName()
    {
        return $this->testName;
    }

    /**
     * @param mixed $testName
     */
    public function setTestName($testName)
    {
        $this->testName = $testName;
    }

    /**
     * @return mixed
     */
    public function getTestResult()
    {
        return $this->testResult;
    }

    /**
     * @param mixed $testResult
     */
    public function setTestResult($testResult)
    {
        $this->testResult = $testResult;
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