<?php

namespace App\Entity;

use App\Repository\PotionEffectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PotionEffectRepository::class)]
class PotionEffect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'potionEffects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Potion $potion = null;

    #[ORM\ManyToOne(inversedBy: 'potionEffects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Effect $effect = null;

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

    public function getEffect(): ?Effect
    {
        return $this->effect;
    }

    public function setEffect(?Effect $effect): static
    {
        $this->effect = $effect;

        return $this;
    }
}
