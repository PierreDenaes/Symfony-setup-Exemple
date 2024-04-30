<?php

namespace App\Entity;

use App\Repository\PotionIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PotionIngredientRepository::class)]
class PotionIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'potionIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Potion $potion = null;

    #[ORM\ManyToOne(inversedBy: 'potionIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ingredient $ingredient = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'potionIngredients')]
    private ?Unite $unite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPotion(): ?Potion
    {
        return $this->potion;
    }

    public function setPotion(?Potion $potion): static
    {
        $this->potion = $potion;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): static
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getUnite(): ?Unite
    {
        return $this->unite;
    }

    public function setUnite(?Unite $unite): static
    {
        $this->unite = $unite;

        return $this;
    }
}
