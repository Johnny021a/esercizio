<?php

namespace App\Controller;

use App\Repository\FiliariRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function Filiari(FiliariRepository $filiariRepository): Response
    {
        $filiari = $filiariRepository->getFiliari();
        return $this->render('home/index.html.twig', [
            'filiari' => $filiari,
        ]);
    }
}
