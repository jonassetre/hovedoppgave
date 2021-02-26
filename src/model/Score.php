<?php

class Score implements JsonSerializable
{
  private $idScore;
  private $score;
  private $scorecol;
  private $answer_idAnswer;


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getIdScore()
    {
        return $this->idScore;
    }

    /**
     * @param mixed $idScore
     */
    public function setIdScore($idScore)
    {
        $this->idScore = $idScore;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getScorecol()
    {
        return $this->scorecol;
    }

    /**
     * @param mixed $scorecol
     */
    public function setScorecol($scorecol)
    {
        $this->scorecol = $scorecol;
    }

    /**
     * @return mixed
     */
    public function getAnswerIdAnswer()
    {
        return $this->answer_idAnswer;
    }

    /**
     * @param mixed $answer_idAnswer
     */
    public function setAnswerIdAnswer($answer_idAnswer)
    {
        $this->answer_idAnswer = $answer_idAnswer;
    }


}