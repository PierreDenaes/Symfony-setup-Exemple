<?php

namespace App\Entity;

use App\Repository\PotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PotionRepository::class)]
class Potion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'potions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MagicalLevel $minMagicalLevel = null;

    #[ORM\ManyToOne(inversedBy: 'potions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Profile $idProfil = null;

    #[ORM\Column]
    private ?bool $isActive = null;

    /**
     * @var Collection<int, PotionIngredient>
     */
    #[ORM\OneToMany(targetEntity: PotionIngredient::class, mappedBy: 'potion',cascade: ['persist', 'remove'])]
    private Collection $potionIngredients;

    /**
     * @var Collection<int, EtapePreparation>
     */
    #[ORM\OneToMany(targetEntity: EtapePreparation::class, mappedBy: 'potion',cascade: ['persist', 'remove'])]
    private Collection $etapePreparations;

    /**
     * @var Collection<int, PotionEffect>
     */
    #[ORM\OneToMany(targetEntity: PotionEffect::class, mappedBy: 'potion',cascade: ['persist', 'remove'])]
    private Collection $potionEffects;

    public function __construct()
    {
        $this->potionIngredients = new ArrayCollection();
        $this->etapePreparations = new ArrayCollection();
        $this->potionEffects = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->isActive = true;
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getMinMagicalLevel(): ?MagicalLevel
    {
        return $this->minMagicalLevel;
    }

    public function setMinMagicalLevel(?MagicalLevel $minMagicalLevel): static
    {
        $this->minMagicalLevel = $minMagicalLevel;

        return $this;
    }

    public function getIdProfil(): ?Profile
    {
        return $this->idProfil;
    }

    public function setIdProfil(?Profile $idProfil): static
    {
        $this->idProfil = $idProfil;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection<int, PotionIngredient>
     */
    public function getPotionIngredients(): Collection
    {
        return $this->potionIngredients;
    }

    public function addPotionIngredient(PotionIngredient $potionIngredient): static
    {
        if (!$this->potionIngredients->contains($potionIngredient)) {
            $this->potionIngredients->add($potionIngredient);
            $potionIngredient->setPotion($this);
        }

        return $this;
    }

    public function removePotionIngredient(PotionIngredient $potionIngredient): static
    {
        if ($this->potionIngredients->removeElement($potionIngredient)) {
            // set the owning side to null (unless already changed)
            if ($potionIngredient->getPotion() === $this) {
                $potionIngredient->setPotion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EtapePreparation>
     */
    public function getEtapePreparations(): Collection
    {
        return $this->etapePreparations;
    }

    public function addEtapePreparation(EtapePreparation $etapePreparation): static
    {
        if (!$this->etapePreparations->contains($etapePreparation)) {
            $this->etapePreparations->add($etapePreparation);
            $etapePreparation->setPotion($this);
        }

        return $this;
    }

    public function removeEtapePreparation(EtapePreparation $etapePreparation): static
    {
        if ($this->etapePreparations->removeElement($etapePreparation)) {
            // set the owning side to null (unless already changed)
            if ($etapePreparation->getPotion() === $this) {
                $etapePreparation->setPotion(null);
            }
        }

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
            $potionEffect->setPotion($this);
        }

        return $this;
    }

    public function removePotionEffect(PotionEffect $potionEffect): static
    {
        if ($this->potionEffects->removeElement($potionEffect)) {
            // set the owning side to null (unless already changed)
            if ($potionEffect->getPotion() === $this) {
                $potionEffect->setPotion(null);
            }
        }

        return $this;
    }
}
