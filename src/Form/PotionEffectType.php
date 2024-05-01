<?php

namespace App\Form;

use App\Entity\Effect;
use App\Entity\PotionEffect;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PotionEffectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('effect', EntityType::class, [
                'class' => Effect::class,
                'choice_label' => 'nom',  // Assurez-vous que la classe Effect a un attribut `name`
                'label' => 'Effet',
                'help' => 'Choisir l\'effet que cette potion produira.'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PotionEffect::class,
        ]);
    }
}
