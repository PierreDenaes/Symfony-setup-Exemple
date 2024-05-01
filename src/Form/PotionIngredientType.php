<?php

// src/Form/PotionIngredientType.php
namespace App\Form;

use App\Entity\Unite;
use App\Entity\Ingredient;
use App\Entity\PotionIngredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PotionIngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ingredient', EntityType::class, [
                'class' => Ingredient::class,
                'choice_label' => 'nom',
            ])
            ->add('quantite', IntegerType::class)
            ->add('unite', EntityType::class, [
                'class' => Unite::class,
                'choice_label' => 'nom',
                'placeholder' => '',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PotionIngredient::class,
        ]);
    }
}
