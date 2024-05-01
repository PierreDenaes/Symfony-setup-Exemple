<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $propriete = null;

    #[ORM\ManyToOne(inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeIngredient $type = null;

    #[ORM\ManyToOne(inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rarete $rarete = null;

    /**
     * @var Collection<int, PotionIngredient>
     */
    #[ORM\OneToMany(targetEntity: PotionIngredient::class, mappedBy: 'ingredient')]
    private Collection $potionIngredients;

    public function __construct()
    {
        $this->potionIngredients = new ArrayCollection();
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

    public function getPropriete(): ?string
    {
        return $this->propriete;
    }

    public function setPropriete(string $propriete): static
    {
        $this->propriete = $propriete;

        return $this;
    }

    public function getType(): ?TypeIngredient
    {
        return $this->type;
    }

    public function setType(?TypeIngredient $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getRarete(): ?Rarete
    {
        return $this->rarete;
    }

    public function setRarete(?Rarete $rarete): static
    {
        $this->rarete = $rarete;

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
            $potionIngredient->setIngredient($this);
        }

        return $this;
    }

    public function removePotionIngredient(PotionIngredient $potionIngredient): static
    {
        if ($this->potionIngredients->removeElement($potionIngredient)) {
            // set the owning side to null (unless already changed)
            if ($potionIngredient->getIngredient() === $this) {
                $potionIngredient->setIngredient(null);
            }
        }

        return $this;
    }
}
