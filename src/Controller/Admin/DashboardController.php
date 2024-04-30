<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Unite;
use App\Entity\Effect;
use App\Entity\Rarete;
use App\Entity\Profile;
use App\Entity\MagicalLevel;
use App\Entity\TypeIngredient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig'); 
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('✨ FreakyFranco Show 🕺')
            ->setFaviconPath('images/cauldron.png')
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Administration du site');
        yield MenuItem::linkToDashboard('Retour DashBoard', 'fa-solid fa-house-laptop');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Profile', 'fa-solid fa-address-card', Profile::class);
        yield MenuItem::section('Le coin des Magiciens');
        yield MenuItem::linkToCrud('Niveaux de Magie', 'fa-solid fa-poo-storm', MagicalLevel::class);
        yield MenuItem::linkToCrud('Les Effets Magiques', 'fa-solid fa-magic', Effect::class);
        yield MenuItem::linkToCrud('Les types d\'ingrédients', 'fa-solid fa-flask', TypeIngredient::class);
        yield MenuItem::linkToCrud('Rareté des ingrédients', 'fa-solid fa-gem', Rarete::class);
        yield MenuItem::linkToCrud('Unités de mesure', 'fa-solid fa-ruler', Unite::class);
        yield MenuItem::section('Retour au site');
        yield MenuItem::linkToRoute('Accueil Site','fa-solid fa-house','app_home');
        yield MenuItem::linkToRoute('Vue Profil','fa-solid fa-eye','app_profile');
    }
}
