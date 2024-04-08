<?php

namespace App\Controller\Admin;

use App\Entity\TipoMezzi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TipoMezziCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TipoMezzi::class;
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
