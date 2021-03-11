<?php

namespace App\Controller\Admin;

use App\Entity\Incentive;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IncentiveCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Incentive::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('name'),
            TextEditorField::new('description'),
            AssociationField::new('program'),
        ];
    }
}
