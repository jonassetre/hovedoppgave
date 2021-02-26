<?php

class Answer implements JsonSerializable
{
  private $idAnswer;
  private $contentAnswer;
  private $isCorrect;
  private $question_idQuestion;


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getIdAnswer()
    {
        return $this->idAnswer;
    }

    /**
     * @param mixed $idAnswer
     */
    public function setIdAnswer($idAnswer)
    {
        $this->idAnswer = $idAnswer;
    }

    /**
     * @return mixed
     */
    public function getContentAnswer()
    {
        return $this->contentAnswer;
    }

    /**
     * @param mixed $contentAnswer
     */
    public function setContentAnswer($contentAnswer)
    {
        $this->contentAnswer = $contentAnswer;
    }

    /**
     * @return mixed
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * @param mixed $isCorrect
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;
    }

    /**
     * @return mixed
     */
    public function getQuestionIdQuestion()
    {
        return $this->question_idQuestion;
    }

    /**
     * @param mixed $question_idQuestion
     */
    public function setQuestionIdQuestion($question_idQuestion)
    {
        $this->question_idQuestion = $question_idQuestion;
    }




}