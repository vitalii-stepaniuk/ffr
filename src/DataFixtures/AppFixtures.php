<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use App\Form\Ingredient1Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Brand;
use App\Entity\WaterTemperatureCondition;
use App\Entity\TypeOfIngredient;
use App\Entity\StreamCondition;
use App\Entity\Unit;
use App\Entity\Fish;
use App\Entity\Ingredient;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getRecipes() as $title) {
            $recipe = new Recipe();
            $recipe->setTitle($title);
            $manager->persist($recipe);
        }
        $manager->flush();

        foreach ($this->getIngredientTypes() as $title) {
            $type = new TypeOfIngredient();
            $type->setTitle($title);
            $manager->persist($type);
        }
        $manager->flush();

        $toiRepository = $manager->getRepository(TypeOfIngredient::class);
        $tois = $toiRepository->findAllIndexed();
        foreach ($this->getIngredients() as $title => $ingredientType) {
            $ingredient = new Ingredient();
            $ingredient->setTitle($title);
            $ingredient->setIngredientType($tois[$ingredientType]);
            $manager->persist($ingredient);
        }

        foreach ($this->getFish() as $title) {
            $fish = new Fish();
            $fish->setTitle($title);
            $manager->persist($fish);
        }

        foreach ($this->getUnits() as $title => $name) {
            $unit = new Unit();
            $unit->setTitle($title);
            $manager->persist($unit);
        }

        foreach ($this->getStreamConditions() as $title) {
            $stream = new StreamCondition();
            $stream->setTitle($title);
            $manager->persist($stream);
        }

        $waterConditions = $this->getWaterTemperatureConditions();
        foreach ($waterConditions as $title) {
            $condition = new WaterTemperatureCondition();
            $condition->setTitle($title);
            $manager->persist($condition);
        }

        $brands = $this->getBrands();

        foreach ($brands as $brandName => $brandData) {
            $brand = new Brand();
            $brand->setTitle($brandName);
            $brand->setShortDescription($brandData['shortDescription']);
            $brand->setUrl($brandData['url']);
            $manager->persist($brand);    
        }
        $manager->flush();

        // @TODO: recipe items
        $recipeRepository = $manager->getRepository(Recipe::class);
        $recipes = $recipeRepository->findAll();
        $recipeArray = [];
        foreach ($recipes as $item) {
            $id = $item->getId();
            $title = $item->getTitle();
            $recipeArray[$id] = $title;
        }
        // So, we already got an array of recipes (already existing/added into the database)
        // Next step is to create a few recipe items.


    }

    private function getRecipes()
    {
        return [
            'for big fish',
            'for small fish',
        ];

    }

    private function getIngredients()
    {
        return [
            'Big fish' => 'Groundbait',
            'Yellow bream' => 'Groundbait',
            'Spice Carassio' => 'Liquid',
            'Carp Corn' => 'Liquid',
        ];
    }

    private function getFish()
    {
        return [
            'Carasio',
            'Carp',
            'Roach',
            'Bream',
            'Skimmer',
        ];
    }

    private function getUnits()
    {
        return [
            'kg' => 'kilogram',
            'g' => 'gram',
            'l' => 'liter',
            'pack' => 'pack',
            'item' => 'item',
        ];
    }

    private function getStreamConditions()
    {
        return [
            'Stream Strong',
            'Stream Average',
            'No Steam',
        ];
    }

    private function getIngredientTypes()
    {
        return [
            'Groundbait',
            'Ground',
            'Water',
            'Liquid',
            'Salt'
        ];
    }

    private function getBrands()
    {
        return [
            'Flagman' => [
                'shortDescription' => 'Flagman of the ukrainian market',
                'url' => 'https://www.flagman.kiev.ua',
            ],
            'Brain' => [
                'shortDescription' => 'Fishing With Brain',
                'url' => 'http://brain-fishing.com/',
            ],
            'Sensas' => [
                'shortDescription' => 'Leader',
                'url' => 'http://www.sensas.com',
            ],
        ];
    }

    private function getWaterTemperatureConditions()
    {
        return [
            'Warn Water',
            'Cold Water',
        ];
    }

}
