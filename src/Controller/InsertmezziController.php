<?php

namespace App\Controller;

use App\Entity\Mezzi;
use App\Repository\FiliariRepository;
use App\Repository\MezziRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InsertmezziController extends AbstractController
{
    /**
     * @Route("/insertmezzi", name="app_insertmezzi")
     */
    /*public function veicoli(MezziRepository $veicoliRepository): Response
    {
        $veicoli = $veicoliRepository->findAll();
        return $this->render('insertmezzi/index.html.twig', [
            'veicoli' => $veicoli,
        ]);
    }*/

    public function Filiari(FiliariRepository $filiariRepository): Response
    {
        $veicoli = $filiariRepository->Filiari();
        return $this->render('insertmezzi/index.html.twig', [
            'veicoli' => $veicoli,
        ]);
    }


    /**
     * Undocumented function
     *  @Route('/Veicoli', name: 'veicoli_crea')
    */
  
    /*public function insertVeicoli (EntityManagerInterface $entityManager): Response
    {
        
        $nuovoMezzo = new Veicoli();
        $nuovoMezzo->setIdVeicoli(12);
        $nuovoMezzo->setCodiceVeicolo('F05');
        $nuovoMezzo->setIdSede('CK005');
        $nuovoMezzo->setTarga('BAD48029');
        $nuovoMezzo->setMarca('Ford');
        $nuovoMezzo->setModello('Transit GLE cabina corta');
        $nuovoMezzo->setTipo(6);
        $nuovoMezzo->setIdRimorchio(0);
        $nuovoMezzo->setDataRevisione('2023-12-18');
        $nuovoMezzo->setDataImm('1991-12-18');
        $nuovoMezzo->setCavalliVapore(90);
        $nuovoMezzo->setClasseEmiss(0);
        $nuovoMezzo->setNSerbatoi(1);
        
        $entityManager->persist($nuovoMezzo);
        
        entityManager->flush();
        dd($nuovoMezzo);

    }*/



}
