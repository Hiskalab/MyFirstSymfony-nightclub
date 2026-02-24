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
        return $this->render('test/index.html.twig', [
            'h1' => "Bienvenue au Nightclub Manager",
            'navigation' => [
                ['href' => '/', 'caption' => 'Accueil'],
                ['href' => '/propos', 'caption' => 'A propos'],
                ['href' => '/contact', 'caption' => 'Contact']
            ]
        ]);
    }
    #[Route('/propos', name: 'propos')]
    public function propos(): Response 
    {
        return $this->render('test/propos.html.twig', [
            'h1' => "Bienvenue sur A propos",
            'navigation' => [
                ['href' => '/', 'caption' => 'Accueil'],
                ['href' => '/propos', 'caption' => 'A propos'],
                ['href' => '/contact', 'caption' => 'Contact']
            ],
            'djs' => [
                ['name' => 'dj1'],
                ['name' => 'dj2']
            ]
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response 
    {
        return $this->render('test/contact.html.twig', [
            'h1' => strtoupper("Bienvenue sur Contact"),
            'navigation' => [
                ['href' => '/', 'caption' => 'Accueil'],
                ['href' => '/propos', 'caption' => 'A propos'],
                ['href' => '/contact', 'caption' => 'Contact']
            ]
        ]);
    }
}
