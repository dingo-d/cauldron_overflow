<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\Collection;
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
   * @ORM\OneToMany(targetEntity="App\Entity\Answer", mappedBy="question", fetch="EXTRA_LAZY")
   * @ORM\OrderBy({"vote" = "DESC"})
   */
  private $answers;

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

  public function getAnswers(): Collection
  {
    return $this->answers;
  }

  public function getNonDeletedAnswers(): Collection
  {
    $criteria = QuestionRepository::createNonDeletedCriteria();

    return $this->answers->matching($criteria);
  }

  public function addAnswer(Answer $answer): self
  {
    if (!$this->answers->contains($answer)) {
      $this->answers[] = $answer;
      $answer->setQuestion($this);
    }

    return $this;
  }

  public function removeAnswer(Answer $answer): self
  {
    if ($this->answers->contains($answer)) {
      $this->answers->removeElement($answer);
      // set the owning side to null (unless already changed)
      if ($answer->getQuestion() === $this) {
        $answer->setQuestion(null);
      }
    }

    return $this;
  }
}
