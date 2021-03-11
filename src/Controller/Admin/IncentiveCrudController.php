<?php

namespace App\Controller\Admin;

use App\Entity\Incentive;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IncentiveCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Incentive::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
