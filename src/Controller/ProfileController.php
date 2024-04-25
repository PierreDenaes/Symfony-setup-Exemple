<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{   
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        $user = $this->getUser();
       if($user->isVerified() == false){
            $this->addFlash('warning', 'Merci de confirmer votre adresse e-mail pour réaliser votre première connexion 🔥💀💀.');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
