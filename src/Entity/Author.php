<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recipe", mappedBy="author")
     */
    private $recipes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Brand", inversedBy="authors")
     */
    private $brands;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
        $this->brands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): self
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes[] = $recipe;
            $recipe->setAuthor($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): self
    {
        if ($this->recipes->contains($recipe)) {
            $this->recipes->removeElement($recipe);
            // set the owning side to null (unless already changed)
            if ($recipe->getAuthor() === $this) {
                $recipe->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Brand[]
     */
    public function getBrands(): Collection
    {
        return $this->brands;
    }

    public function addBrand(Brand $brand): self
    {
        if (!$this->brands->contains($brand)) {
            $this->brands[] = $brand;
        }

        return $this;
    }

    public function removeBrand(Brand $brand): self
    {
        if ($this->brands->contains($brand)) {
            $this->brands->removeElement($brand);
        }

        return $this;
    }
}
