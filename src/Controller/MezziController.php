<?php

namespace App\Controller;

use App\Repository\MezziRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MezziController extends AbstractController
{
    /**
    * @Route("/mezzi/{filiareId}",
    * defaults={"filiareId"=0}, name="app_mezzi")
    */
   
    /*public function veicoli(MezziRepository $MezziRepository): Response
    {
        $veicoli = $MezziRepository->findAll();
        return $this->render('mezzi/index.html.twig', [
            'veicoli' => $veicoli,
        ]);
    }*/

    public function index($filiareId, MezziRepository $MezziRepository): Response
    {

        $veicoli = $MezziRepository->getFiliariMezzi($filiareId);
        if($veicoli)
        {
            return $this->render('mezzi/index.html.twig', [
                'veicoli' => $veicoli,
            ]);
        }else{
            $veicoli = $MezziRepository->getMezzi();
            return $this->render('mezzi/index.html.twig', [
                'veicoli' => $veicoli,
            ]);
        }

    }


    
     
}
