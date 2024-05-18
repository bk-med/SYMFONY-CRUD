<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\LivreRepository;
use App\Repository\AuteurRepository; // Ajoutez ceci pour importer le AuteurRepository

class IndexController extends AbstractController
{
    #[Route("/index", name: "index")]
    public function index(LivreRepository $livreRepository, AuteurRepository $auteurRepository): Response
    {
        // Utilisez le LivreRepository pour récupérer les livres
        $livres = $livreRepository->findAll();
        
        // Utilisez le AuteurRepository pour récupérer les auteurs
        $auteurs = $auteurRepository->findAll();

        // Rendez le modèle Twig en passant les variables 'livres' et 'auteurs' comme contexte
        return $this->render('index/index.html.twig', [
            'livres' => $livres,
            'auteurs' => $auteurs
        ]);
    }
}
