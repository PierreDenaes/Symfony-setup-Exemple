<?php

namespace App\Entity;

use App\Repository\EffectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EffectRepository::class)]
class Effect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duree = null;

    /**
     * @var Collection<int, PotionEffect>
     */
    #[ORM\OneToMany(targetEntity: PotionEffect::class, mappedBy: 'effect')]
    private Collection $potionEffects;

    public function __construct()
    {
        $this->potionEffects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection<int, PotionEffect>
     */
    public function getPotionEffects(): Collection
    {
        return $this->potionEffects;
    }

    public function addPotionEffect(PotionEffect $potionEffect): static
    {
        if (!$this->potionEffects->contains($potionEffect)) {
            $this->potionEffects->add($potionEffect);
            $potionEffect->setEffect($this);
        }

        return $this;
    }

    public function removePotionEffect(PotionEffect $potionEffect): static
    {
        if ($this->potionEffects->removeElement($potionEffect)) {
            // set the owning side to null (unless already changed)
            if ($potionEffect->getEffect() === $this) {
                $potionEffect->setEffect(null);
            }
        }

        return $this;
    }
}
