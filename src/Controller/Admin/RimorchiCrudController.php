<?php

namespace App\Controller\Admin;

use App\Entity\Rimorchi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RimorchiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rimorchi::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            AssociationField::new('filiare'),
            TextField::new('codiceMezzo','Codice'),
            AssociationField::new('tipoMezzo','Tipo'),
            TextField::new('marca'),
            TextField::new('modello'),
            DateField::new('dataImm'),
            DateField::new('dataRev'),
            IntegerField::new('nAssi','Assi')
        ];
    }
    
}
