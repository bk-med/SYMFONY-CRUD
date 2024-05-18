<?php

// src/Service/UserRegistrationService.php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;

class UserRegistrationService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function registerUser($username, $plainPassword)
    {
        // Créer un nouvel utilisateur
        $users = new Users();
        $users->setUsername($username);
        
        // Stocker le mot de passe en texte brut (NON recommandé)
        // Pour des raisons de sécurité, il est recommandé d'utiliser UserPasswordEncoderInterface
        $users->setPassword($plainPassword);

        // Enregistrer l'utilisateur dans la base de données
        $this->entityManager->persist($users);
        $this->entityManager->flush();

        return $users;
    }
}
