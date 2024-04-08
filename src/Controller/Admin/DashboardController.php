<?php

namespace App\Controller\Admin;

use App\Entity\Filiari;
use App\Entity\Mezzi;
use App\Entity\Rimorchi;
use App\Entity\Sedi;
use App\Entity\TipoMezzi;
use App\Entity\TipoVeicolo;
use App\Entity\Veicoli;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //$AdminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        //return $this->redirect($AdminUrlGenerator->setController(VeicoliCrudController::class)->generateUrl());
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('mezzi', 'fa fa-home', Mezzi::class);
        yield MenuItem::linkToCrud('filiari', 'fa fa-home', Filiari::class);
        yield MenuItem::linkToCrud('rimorchi', 'fa fa-home', Rimorchi::class);
        yield MenuItem::linkToCrud('tipoMezzi', 'fa fa-home', TipoMezzi::class);
    }
}


