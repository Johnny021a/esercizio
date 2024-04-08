<?php

namespace App\Controller\Admin;

use App\Entity\Filiari;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FiliariCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Filiari::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('codiceFiliare','Filiare'),
            AssociationField::new('mezzis', 'Mezzi associati')->setCrudController(MezziCrudController::class),
            AssociationField::new('rimorchis', 'Rimorchi associati'),
            IntegerField::new('cap'),
            TextField::new('prov','Provincia'),
            TextField::new('citta'),
            TextField::new('indirizzo'),
            TelephoneField::new('telefono'),
            EmailField::new('email'),
            //TextEditorField::new('description'),
        ];
    }
    
    /*public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ;
    }*/
}
