<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex()
            ->onlyOnDetail();
        yield TextField::new('name');
        yield AvatarField::new('logo');

        yield TextField::new('siren');
        yield TextField::new('interlocutaire');
        yield TextField::new('phone', 'Téléphone');
        yield TextField::new('mail');
        yield TextField::new('adress', 'Adresse');
        yield BooleanField::new('status');
        yield AssociationField::new('dossiers')->setFormTypeOption('by_reference', false);
    }
}
