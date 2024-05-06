<?php

namespace App\Form;

use App\Entity\MagicalLevel;
use App\Entity\Potion;
use App\Form\PotionIngredientType;
use App\Form\EtapePreparationType;
use App\Form\PotionEffectType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PotionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la potion'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('minMagicalLevel', EntityType::class, [
                'class' => MagicalLevel::class,
                'choice_label' => 'name', 
                'label' => 'Niveau Magique Minimum'
            ])
            ->add('potionIngredients', CollectionType::class, [
                'entry_type' => PotionIngredientType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('etapePreparations', CollectionType::class, [
                'entry_type' => EtapePreparationType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('potionEffects', CollectionType::class, [
                'entry_type' => PotionEffectType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Potion::class,
        ]);
    }
}
