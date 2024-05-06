<?php

namespace App\Controller;

use App\Entity\Potion;
use Doctrine\ORM\EntityManagerInterface;
use App\Components\PotionDisplayComponent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager, PotionDisplayComponent $potionDisplayComponent): Response
    {
        $potions = $entityManager->getRepository(Potion::class)->findAll();
        $potionDisplayComponent->setPotions($potions);

        return $this->render('home/index.html.twig', [
            'component' => $potionDisplayComponent,
        ]);
    }

}
