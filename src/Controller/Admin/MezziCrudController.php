<?php

namespace App\Controller\Admin;

use App\Entity\Mezzi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Integer;

class MezziCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mezzi::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            AssociationField::new('filiare'),
            TextField::new('codiceMezzo','Codice'),
            AssociationField::new('tipoMezzo','Tipo'),
            TextField::new('targa'),
            TextField::new('marca'),
            TextField::new('modello'),
            DateField::new('dataImm'),
            DateField::new('dataRev'),
            IntegerField::new('classeEmiss','Euro'),
            IntegerField::new('nSerbatoi','Serbatoi'),
            AssociationField::new('rimorchio','Trailer'),
        ];
    }
    
}
