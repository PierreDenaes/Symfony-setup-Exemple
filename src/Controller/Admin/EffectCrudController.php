<?php

namespace App\Controller\Admin;

use App\Entity\Effect;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EffectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Effect::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
            TimeField::new('duree')->renderAsChoice()
            ->setFormat('HH:mm'),
        ];
    }
    
}
