<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipeItemRepository")
 */
class RecipeItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Recipe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Recipe;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->Recipe;
    }

    public function setRecipe(Recipe $Recipe): self
    {
        $this->Recipe = $Recipe;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}
