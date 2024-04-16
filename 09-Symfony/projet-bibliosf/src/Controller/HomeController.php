<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(LivreRepository $livreRepository): Response
    {

        // EXERCICES : 
        //  Exo 1 : On veut que cette route se lance quand on est à la racine du projet... (lorsque je suis sur https://127.0.0.1:8000/ dans mon navigateur), cherchez comme rendre cela possible (pour cela il suffit simplement d'enlever le mot home de la route et de laisser uniquement / )

        // Exo 2 : Affichez la liste des livres sous forme de vignette 
        // Première chose à faire : récupération de tous les livres via le repository
        $livres = $livreRepository->findAll();


        return $this->render('home/index.html.twig', [
          "livres" => $livres
        ]);
    }
}
