<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzRepository::class)]
class Quizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $question = null;

    #[ORM\Column(length: 255)]
    private ?string $answer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $answer2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $answer3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $answer4 = null;

    #[ORM\Column]
    private ?int $goodanswer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function getAnswer2(): ?string
    {
        return $this->answer2;
    }

    public function setAnswer2(?string $answer2): static
    {
        $this->answer2 = $answer2;

        return $this;
    }

    public function getAnswer3(): ?string
    {
        return $this->answer3;
    }

    public function setAnswer3(?string $answer3): static
    {
        $this->answer3 = $answer3;

        return $this;
    }

    public function getAnswer4(): ?string
    {
        return $this->answer4;
    }

    public function setAnswer4(?string $answer4): static
    {
        $this->answer4 = $answer4;

        return $this;
    }

    public function getGoodanswer(): ?int
    {
        return $this->goodanswer;
    }

    public function setGoodanswer(int $goodanswer): static
    {
        $this->goodanswer = $goodanswer;

        return $this;
    }
}
