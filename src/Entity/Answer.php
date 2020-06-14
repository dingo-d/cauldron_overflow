<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
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
   * @ORM\ManyToOne(targetEntity="Question", inversedBy="answer")
   */
  private $question;

  /**
   * @ORM\ManyToOne(targetEntity=User::class, inversedBy="answers")
   * @ORM\JoinColumn(nullable=false)
   */
  private $author;

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

  public function getAuthor(): ?User
  {
    return $this->author;
  }

  public function setAuthor(?User $author): self
  {
    $this->author = $author;

    return $this;
  }

  public function incrementVote(): self
  {
    $this->vote = $this->vote + 1;

    return $this;
  }

  public function decrementVote(): self
  {
    $this->vote = $this->vote - 1;

    return $this;
  }
}
