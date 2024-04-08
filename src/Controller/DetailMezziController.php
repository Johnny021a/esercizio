<?php

namespace App\Controller;

use App\Repository\MezziRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailMezziController extends AbstractController
{
    /**
     * @Route("/detail/mezzi{mezzoId}", 
     * * defaults={"mezzoId"=0}, name="app_detail_mezzi")
     */
    public function index($mezzoId, MezziRepository $MezziRepository): Response
    {

        $veicoli = $MezziRepository->getMezzo($mezzoId);
        if($mezzoId)
        {
            
            return $this->render('detail_mezzi/index.html.twig', [
                'veicoli' => $veicoli,
            ]);
        }else{
            $filiari = $MezziRepository->findAll();
            return $this->render('detail_mezzi/index.html.twig', [
                'veicoli' => $veicoli,
            ]);
        }

    } 
}
