<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AtelierRepository;


final class AtelierController extends AbstractController
{
    #[Route('/ateliers', name: 'app_ateliers')]
    public function index(AtelierRepository $atelierRepository): Response
    {


        $ateliers = $atelierRepository->findAll();
        return $this->render('atelier_controleur/index.html.twig', [
            'ateliers' => $ateliers,
        ]);
    }
}
