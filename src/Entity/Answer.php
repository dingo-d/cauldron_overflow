<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Answer
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $content;

  /**
   * @ORM\Column(type="bigint", nullable=true)
   */
  private $vote = 0;

  /**
   * @ORM\ManyToOne(targetEntity="Question")
   */
  private $question;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(string $content): self
  {
    $this->content = $content;

    return $this;
  }

  public function getVote(): ?string
  {
    return $this->vote;
  }

  public function setVote(?string $vote): self
  {
    $this->vote = $vote;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getQuestion()
  {
    return $this->question;
  }

  /**
   * @param mixed $question
   */
  public function setQuestion(Question $question): void
  {
    $this->question = $question;
  }

  public function setVoteCount(int $vote): self
  {
    $this->vote = $vote;

    return $this;
  }
}
