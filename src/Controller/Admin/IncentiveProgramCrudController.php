<?php

namespace App\Controller\Admin;

use App\Entity\IncentiveProgram;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IncentiveProgramCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IncentiveProgram::class;
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
