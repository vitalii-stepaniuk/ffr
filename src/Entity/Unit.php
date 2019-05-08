<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnitRepository")
 */
class Unit
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
     * @ORM\OneToMany(targetEntity="App\Entity\RecipeItem", mappedBy="unit")
     */
    private $recipeItems;

    public function __construct()
    {
        $this->recipeItems = new ArrayCollection();
    }

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

    public function __toString() {
        return $this->title;
    }

    /**
     * @return Collection|RecipeItem[]
     */
    public function getRecipeItems(): Collection
    {
        return $this->recipeItems;
    }

    public function addRecipeItem(RecipeItem $recipeItem): self
    {
        if (!$this->recipeItems->contains($recipeItem)) {
            $this->recipeItems[] = $recipeItem;
            $recipeItem->setUnit($this);
        }

        return $this;
    }

    public function removeRecipeItem(RecipeItem $recipeItem): self
    {
        if ($this->recipeItems->contains($recipeItem)) {
            $this->recipeItems->removeElement($recipeItem);
            // set the owning side to null (unless already changed)
            if ($recipeItem->getUnit() === $this) {
                $recipeItem->setUnit(null);
            }
        }

        return $this;
    }
}
