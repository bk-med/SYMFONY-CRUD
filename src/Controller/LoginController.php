<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(Request $request): Response
    {
        // Récupérer les erreurs de connexion s'il y en a
        $error = $request->getSession()->get('_security.last_error');

        // Dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $request->getSession()->get('_security.last_username');

        return $this->render('login/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
}
