<?php

namespace App\Entity;

use App\Repository\UniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniteRepository::class)]
class Unite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    /**
     * @var Collection<int, PotionIngredient>
     */
    #[ORM\OneToMany(targetEntity: PotionIngredient::class, mappedBy: 'unite')]
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
            $potionIngredient->setUnite($this);
        }

        return $this;
    }

    public function removePotionIngredient(PotionIngredient $potionIngredient): static
    {
        if ($this->potionIngredients->removeElement($potionIngredient)) {
            // set the owning side to null (unless already changed)
            if ($potionIngredient->getUnite() === $this) {
                $potionIngredient->setUnite(null);
            }
        }

        return $this;
    }
}
