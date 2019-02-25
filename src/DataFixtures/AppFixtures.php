<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Brand;
use App\Entity\WaterTemperatureCondition;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
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
