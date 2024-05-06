<?php

namespace App\Components;

use App\Entity\Potion;
use App\Form\PotionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Environment as TwigEnvironment;

#[AsLiveComponent('PotionFormComponent')]
class PotionFormComponent
{
    use DefaultActionTrait, ComponentWithFormTrait;

    private EntityManagerInterface $entityManager;
    private FormFactoryInterface $formFactory;
    private TokenStorageInterface $tokenStorage;
    private RequestStack $requestStack;
    private TwigEnvironment $twig;

    #[LiveProp(writable: ['nom', 'description', 'minMagicalLevel', 'isActive'], fieldName: 'potionData')]
    public Potion $potion;

    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory, TokenStorageInterface $tokenStorage, RequestStack $requestStack, TwigEnvironment $twig)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->tokenStorage = $tokenStorage;
        $this->requestStack = $requestStack; 
        $this->twig = $twig;
        // Logique pour initialiser l'objet $potion
        $this->initializePotion();
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->formFactory->create(PotionType::class, $this->potion);
    }
    private function initializePotion()
    {
        $token = $this->tokenStorage->getToken();
        if ($token && $token->getUser() && method_exists($token->getUser(), 'getProfile')) {
            $userProfile = $token->getUser()->getProfile();
            $this->potion = new Potion();
            $this->potion->setIdProfil($userProfile);
            $this->form = $this->formFactory->create(PotionType::class, $this->potion);
        } else {
            throw new \LogicException('User must be logged in and have a profile to create a potion.');
        }
    }
    

    #[LiveAction]
    public function savePotion()
    {
        $form = $this->formFactory->create(PotionType::class, $this->potion);
        $form->handleRequest($this->requestStack->getCurrentRequest());

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($this->potion);
            $this->entityManager->flush();

            // Si la requête est une requête Turbo, renvoyez une réponse Turbo Stream
            if ($this->requestStack->getCurrentRequest()->headers->get('Turbo-Frame')) {
                // Définissez le format de la requête sur turbo_stream
                $this->requestStack->getCurrentRequest()->setRequestFormat('turbo_stream');

                // Renvoyez le HTML pour le Turbo Stream
                return new Response(
                    $this->twig->render('components/PotionDisplayComponent.stream.html.twig', [
                        'potion' => $this->potion
                    ]),
                    200,
                    ['Content-Type' => 'text/vnd.turbo-stream.html']
                );
            }

            // Pour une requête non-Turbo, vous pouvez par exemple rediriger l'utilisateur
            return new Response('Le profil a été mis à jour');
        }

        // Retourner le formulaire avec ou sans erreurs
        return $this->twig->render('components/PotionFormComponent.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
