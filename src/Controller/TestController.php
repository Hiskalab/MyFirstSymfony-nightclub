<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig');
    }
    #[Route('/propos', name: 'propos')]
    public function propos(): Response 
    {
        return $this->render('test/propos.html.twig');
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response 
    {
        return $this->render('test/contact.html.twig');
    }
}
