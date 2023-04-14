<?php

namespace App\Controller\Admin;

use App\Entity\Dossiers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DossiersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dossiers::class;
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
