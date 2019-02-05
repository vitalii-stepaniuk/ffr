<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Form\RecipeItemType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Recipe3Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('condition_stream')
            ->add('condition_water_temperature')
            ->add('items', RecipeItemType::class, [
                'data_class' => null,
                'label' => 'The recipe consists of',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
