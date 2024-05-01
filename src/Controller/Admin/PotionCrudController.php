<?php

namespace App\Controller\Admin;

use App\Entity\Potion;
use App\Form\PotionEffectType;
use App\Form\EtapePreparationType;
use App\Form\PotionIngredientType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PotionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Potion::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', 'Nom de la potion'),
            TextareaField::new('description', 'Description'),
            DateTimeField::new('createdAt', 'Créé le')->setFormat('dd/MM/YYYY HH:mm:ss')->hideOnForm(),
            AssociationField::new('minMagicalLevel', 'Niveau magique minimum'),
            AssociationField::new('idProfil', 'Profil associé'),
            BooleanField::new('isActive', 'Active'),

            CollectionField::new('potionIngredients', 'Ingrédients')
                ->setEntryType(PotionIngredientType::class)
                ->setFormTypeOptions(['by_reference' => false])
                ->onlyOnForms(),

            CollectionField::new('etapePreparations', 'Étapes de préparation')
                ->setEntryType(EtapePreparationType::class)
                ->setFormTypeOptions(['by_reference' => false])
                ->onlyOnForms(),

            CollectionField::new('potionEffects', 'Effets de la potion')
                ->setEntryType(PotionEffectType::class)
                ->setFormTypeOptions(['by_reference' => false])
                ->onlyOnForms()
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Potion')
            ->setEntityLabelInPlural('Potions')
            ->setSearchFields(['nom', 'description'])
            ->setDefaultSort(['createdAt' => 'DESC']);
    }
    
}
