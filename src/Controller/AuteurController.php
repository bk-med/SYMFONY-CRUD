<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    #[Route('/auteurs', name: 'app_auteurs')]
    public function index(AuteurRepository $auteurRepository): Response
    {
        $auteurs = $auteurRepository->findAll();
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    #[Route('/auteurs/nouveau', name: 'ajouter_auteur')]
    public function ajouterAuteur(Request $request, EntityManagerInterface $entityManager): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('app_auteurs');
        }

        return $this->render('auteur/nouveau.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/modifier-auteur/{id}', name: 'modifier_auteur')]
    public function modifierAuteur(Request $request, Auteur $auteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_auteurs');
        }

        return $this->render('auteur/modifier.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/supprimer-auteur/{id}', name: 'supprimer_auteur')]
    public function supprimerAuteur(Auteur $auteur, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($auteur);
        $entityManager->flush();
        return $this->redirectToRoute('app_auteurs');
    }
}
