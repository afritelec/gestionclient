<?php

namespace App\Controller\Admin;

use App\Entity\Dossiers;
use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DossiersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dossiers::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        //->onlyOnDetail();
        yield TextField::new('reference');
        yield DateField::new('createDate');
        yield DateField::new('modDate');
        yield TextField::new('siteClient');

        yield BooleanField::new('status');

        yield AssociationField::new('client')
            ->setFormTypeOption('by_reference', true);

        yield AssociationField::new('services')
            ->setFormTypeOption('by_reference', true);
    }
}
