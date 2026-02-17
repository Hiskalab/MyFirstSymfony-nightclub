<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
    #[Route('/liste', name: 'app_liste')]
    public function liste(): Response
    {
        return $this->render('admin/liste.html.twig');
    }
    #[Route('/parametre', name: 'app_parametre')]
    public function parametre(): Response
    {
        return $this->render('admin/parametre.html.twig');
    }
}
