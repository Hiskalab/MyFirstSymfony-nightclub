<?php

namespace App\Controller;

use App\Entity\Soiree;
use App\Form\SoireeType;
use App\Repository\SoireeRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



final class SoireeController extends AbstractController
{
    #[Route('/soiree', name: 'app_soiree')]
    function index(SoireeRepository $soireeRepository) {
        $soiree = $soireeRepository->findAll();
        dd($soiree);
    }

    #[Route('/soiree/{id}/update', name: 'update_soiree')]
    function update(EntityManagerInterface $em, int $id) {
        $repository = $em->getRepository(Soiree::class);
        $soireeUpdate = $repository->find($id);
        $soireeUpdate->setTitre("Soiree tech $id");
        $em->flush();
        dd($soireeUpdate);
    }

    #[Route('/soiree/{id}/delete', name: 'delete_soiree')]
    function delete_soiree(EntityManagerInterface $em, int $id) {
        $repository = $em->getRepository(Soiree::class);
        $soiree = $repository->find($id);
        $em->remove($soiree);
        $em->flush();
        return $this->redirectToRoute('app_soiree');
    }
    
    #[Route('/soiree/creer', name: 'creer_soiree')]
    function creerSoiree(EntityManagerInterface $em, Request $request): Response
    {
        $soiree = new Soiree();
        $form = $this->createForm(SoireeType::class, $soiree, [
            'attr' => ['novalidate' => 'novalidate']
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($soiree);
            $em->flush();
            return $this->redirectToRoute('app_soiree');
        }
        return $this->render('soiree/creer.html.twig', [
            'form' => $form->createView(),
            'h1' => strtoupper("Bienvenue sur Contact"),
            'navigation' => [
                ['href' => '/', 'caption' => 'Accueil'],
                ['href' => '/propos', 'caption' => 'A propos'],
                ['href' => '/contact', 'caption' => 'Contact']
            ]
        ]);
    }
}
