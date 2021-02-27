<?php

class Comment implements JsonSerializable
{
  private $idComment;
  private $commentContent;
  private $commentDate;
  private $answer_idAnswer;


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->idComment;
    }

    /**
     * @param mixed $idComment
     */
    public function setIdComment($idComment)
    {
        $this->idComment = $idComment;
    }

    /**
     * @return mixed
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * @param mixed $commentContent
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param mixed $commentDate
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
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