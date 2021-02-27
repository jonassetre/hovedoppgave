<?php

class Question implements JsonSerializable
{
  private $idQuestion;
  private $questContent;
  private $diff_degree;
  private $tag;
  private $groupname_idGroup;
  private $test_idTest;


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * @param mixed $idQuestion
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;
    }

    /**
     * @return mixed
     */
    public function getQuestContent()
    {
        return $this->questContent;
    }

    /**
     * @param mixed $questContent
     */
    public function setQuestContent($questContent)
    {
        $this->questContent = $questContent;
    }

    /**
     * @return mixed
     */
    public function getDiffDegree()
    {
        return $this->diff_degree;
    }

    /**
     * @param mixed $diff_degree
     */
    public function setDiffDegree($diff_degree)
    {
        $this->diff_degree = $diff_degree;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getGroupnameIdGroup()
    {
        return $this->groupname_idGroup;
    }

    /**
     * @param mixed $groupname_idGroup
     */
    public function setGroupnameIdGroup($groupname_idGroup)
    {
        $this->groupname_idGroup = $groupname_idGroup;
    }

    /**
     * @return mixed
     */
    public function getTestIdTest()
    {
        return $this->test_idTest;
    }

    /**
     * @param mixed $test_idTest
     */
    public function setTestIdTest($test_idTest)
    {
        $this->test_idTest = $test_idTest;
    }

}