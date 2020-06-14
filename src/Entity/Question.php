<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository", repositoryClass=QuestionRepository::class)
 */
class Question
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
  private $title;

  /**
   * @Gedmo\Slug(fields={"title"})
   * @ORM\Column(type="string", length=100, unique=true)
   */
  private $slug;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $questionContent;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $publishedAt;

  /**
   * @ORM\ManyToOne(targetEntity=User::class, inversedBy="questions")
   * @ORM\JoinColumn(nullable=false)
   */
  private $author;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="question")
   */
  private $answer;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): self
  {
    $this->title = $title;

    return $this;
  }

  public function getSlug(): ?string
  {
    return $this->slug;
  }

  public function setSlug(string $slug): self
  {
    $this->slug = $slug;

    return $this;
  }

  public function getQuestionContent(): ?string
  {
    return $this->questionContent;
  }

  public function setQuestionContent(string $questionContent): self
  {
    $this->questionContent = $questionContent;

    return $this;
  }

  public function getPublishedAt(): ?\DateTimeInterface
  {
    return $this->publishedAt;
  }

  public function setPublishedAt(?\DateTimeInterface $publishedAt): self
  {
    $this->publishedAt = $publishedAt;

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

  public function getAnswer()
  {
    return $this->answer;
  }

  public function setAnswer($answer): void
  {
    $this->answer = $answer;
  }
}
