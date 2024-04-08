<?php

namespace App\Controller\Admin;

use App\Entity\Veicoli;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Controller\Admin\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField as FieldIdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VeicoliCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Veicoli::class;
    }



    
    public function configureFields(string $pageName): iterable
    {
        return [
            //FieldIdField::new('id')->hideOnForm(),
            TextField::new('codice_veicolo'),
            AssociationField::new('sede'),
            TextField::new('targa'),
            TextField::new('marca'),
            TextField::new('modello'),
            IntegerField::new('tipo'),
            IntegerField::new('id_rimorchio'),
            DateField::new('data_revisione'),
            DateField::new('data_imm'),
            IntegerField::new('cavalli_vapore'),
            IntegerField::new('classe_emiss'),
            IntegerField::new('n_serbatoi'),
        ];
    }
    
}
