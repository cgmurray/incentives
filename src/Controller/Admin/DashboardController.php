<?php

namespace App\Controller\Admin;

use App\Entity\Achievement;
use App\Entity\Employer;
use App\Entity\Incentive;
use App\Entity\IncentiveManagingPartner;
use App\Entity\IncentiveProgram;
use App\Entity\Reward;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(EmployerCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
        if ('jane' === $this->getUser()->getUsername()) {
            return $this->redirect('...');
        }

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('some/path/my-dashboard.html.twig');

        // Original generated code
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Incentives');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Admin Home', 'fa fa-home');
        yield MenuItem::section('Manage Data');
        yield MenuItem::linkToCrud('Incentive Partners', 'fas fa-list', IncentiveManagingPartner::class);
        yield MenuItem::linkToCrud('Incentive Programs', 'fas fa-list', IncentiveProgram::class);
        yield MenuItem::linkToCrud('Employers', 'fas fa-list', Employer::class);
        yield MenuItem::linkToCrud('Incentives', 'fas fa-list', Incentive::class);
        yield MenuItem::linkToCrud('Achievements', 'fas fa-list', Achievement::class);
        yield MenuItem::linkToCrud('Rewards', 'fas fa-list', Reward::class);
    }
}
