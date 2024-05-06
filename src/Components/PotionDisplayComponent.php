<?php

namespace App\Components;

use App\Entity\Potion;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment as TwigEnvironment;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;


#[AsLiveComponent('PotionDisplayComponent')]
class PotionDisplayComponent
{
    use DefaultActionTrait;

    private EntityManagerInterface $entityManager;
    #[LiveProp]
    private ArrayCollection $potions;
    private TwigEnvironment $twig;
    private RequestStack $requestStack;

    public function __construct(EntityManagerInterface $entityManager, TwigEnvironment $twig, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->twig = $twig;
        $this->requestStack = $requestStack;
        $this->loadPotions();
    }

    private function loadPotions(): void
    {
        $this->potions = new ArrayCollection(
            $this->entityManager->getRepository(Potion::class)->findAll()
        );
    }

    public function getPotions(): ArrayCollection
    {
        return $this->potions;
    }

    public function setPotions(array $potions): void
    {
        $this->potions = new ArrayCollection($potions);
    }

    public function render(): string
    {
        return $this->twig->render(
            'components/PotionDisplayComponent.stream.html.twig',
            ['component' => $this]
        );
    }
}