<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
    #[Route('/show/{id}', name: 'app_show', defaults: ['id' => 1], requirements: ['id' => '\d+'])]
    public function show(int $id): Response
    {
        return new Response("Article n $id");
    }
    #[Route('/new/{slug}', name: 'app_new')]
    public function new(string $slug): Response
    {
        return $this->render('article/new.html.twig', [
            'slug' => $slug,
        ]);
    }
}
