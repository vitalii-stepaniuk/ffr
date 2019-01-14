<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 */
class Ingredient
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
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeOfIngredient", inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient_type;

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

    public function getIngredientType(): ?TypeOfIngredient
    {
        return $this->ingredient_type;
    }

    public function setIngredientType(?TypeOfIngredient $ingredient_type): self
    {
        $this->ingredient_type = $ingredient_type;

        return $this;
    }

    public function __toString() {
        return $this->title;
    }
}
