<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    public function __construct() {
        $this->createAt = new DateTimeImmutable();
        // Pour faire une date un peu aléatoire
        $seconds = mt_rand(0,60);
        $minutes = mt_rand(0,60);
        $hours = mt_rand(0,24);
        $days = mt_rand(0,30);
        $months = mt_rand(0,11);
        $years = mt_rand(-10,-1);
        $this->createAt = $this->createAt->modify("$years years $months months $days days $hours hours $minutes minutes $seconds seconds");
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(min: 3, max: 50)]
    #[Assert\NotBlank()]
    private string $name;

    #[ORM\Column]
    #[Assert\Positive()]
    #[Assert\LessThan(200)]
    #[Assert\NotNull()]
    # essai perso : #[Assert\Range(min: 0.01, max: 200)]
    private float $price;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $createAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }
}
