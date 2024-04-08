<?php

namespace App\Controller;

use App\Repository\FiliariRepository;
use App\Repository\MezziRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailFiliareController extends AbstractController
{
    /**
     * @Route("/detail/filiare/{filiareId}", 
     * * defaults={"filiareId"=0},name="app_detail_filiare")
     */
    public function index($filiareId, FiliariRepository $FiliariRepository): Response
    {

        $filiari = $FiliariRepository->getSingleFiliare($filiareId);
        if($filiari)
        {
            
            return $this->render('detail_filiare/index.html.twig', [
                'filiari' => $filiari,
            ]);
        }else{
            $filiari = $FiliariRepository->findAll();
            return $this->render('detail_filiare/index.html.twig', [
                'filiari' => $filiari,
            ]);
        }

    } 
}
