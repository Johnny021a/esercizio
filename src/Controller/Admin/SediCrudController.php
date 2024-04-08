<?php

namespace App\Controller\Admin;

use App\Entity\Sedi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SediCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sedi::class;
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
