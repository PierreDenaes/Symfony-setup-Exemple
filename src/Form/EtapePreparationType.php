<?php

namespace App\Form;

use App\Entity\EtapePreparation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EtapePreparationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ordre', IntegerType::class, [
                'label' => 'Ordre',
                'help' => 'Définir l\'ordre de cette étape dans la préparation de la potion.'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'help' => 'Décrire en détail les actions à réaliser à cette étape.'
            ])
            ->add('duree', TimeType::class, [
                'label' => 'Durée',
                'input'  => 'datetime',
                'widget' => 'choice',
                'help' => 'Saisir la durée prévue pour cette étape.',
                'with_seconds' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EtapePreparation::class,
        ]);
    }
}
