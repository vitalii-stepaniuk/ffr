<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 */
class Recipe
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
     * @ORM\ManyToMany(targetEntity="App\Entity\StreamCondition", inversedBy="recipes")
     */
    private $condition_stream;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\WaterTemperatureCondition", inversedBy="recipes")
     */
    private $condition_water_temperature;

    public function __construct()
    {
        $this->condition_stream = new ArrayCollection();
        $this->condition_water_temperature = new ArrayCollection();
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

    /**
     * @return Collection|StreamCondition[]
     */
    public function getConditionStream(): Collection
    {
        return $this->condition_stream;
    }

    public function addConditionStream(StreamCondition $conditionStream): self
    {
        if (!$this->condition_stream->contains($conditionStream)) {
            $this->condition_stream[] = $conditionStream;
        }

        return $this;
    }

    public function removeConditionStream(StreamCondition $conditionStream): self
    {
        if ($this->condition_stream->contains($conditionStream)) {
            $this->condition_stream->removeElement($conditionStream);
        }

        return $this;
    }

    /**
     * @return Collection|WaterTemperatureCondition[]
     */
    public function getConditionWaterTemperature(): Collection
    {
        return $this->condition_water_temperature;
    }

    public function addConditionWaterTemperature(WaterTemperatureCondition $conditionWaterTemperature): self
    {
        if (!$this->condition_water_temperature->contains($conditionWaterTemperature)) {
            $this->condition_water_temperature[] = $conditionWaterTemperature;
        }

        return $this;
    }

    public function removeConditionWaterTemperature(WaterTemperatureCondition $conditionWaterTemperature): self
    {
        if ($this->condition_water_temperature->contains($conditionWaterTemperature)) {
            $this->condition_water_temperature->removeElement($conditionWaterTemperature);
        }

        return $this;
    }

    public function __toString() {
        return $this->title;
    }
}
