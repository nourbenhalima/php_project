<?php

namespace App\Controller;

use App\Entity\Author;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/affichage.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }


    #[Route('/display', name: 'Display')]
    public function listAuth(ManagerRegistry $doctrine,Request $request ): Response
    {
        $AuthorRepo= $doctrine->getRepository(Author::class);
        $Authors= $AuthorRepo->findAll();
        return $this->render('author/affichage.html.twig', [
            'authors' => $Authors,
        ]);
    }
}