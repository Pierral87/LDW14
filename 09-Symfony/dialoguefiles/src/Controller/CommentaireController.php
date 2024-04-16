<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommentaireController extends AbstractController
{
    #[Route('/commentaire', name: 'app_commentaire')]
    public function index(Request $request, EntityManagerInterface $em, CommentaireRepository $commentaireRepository): Response
    {

        $commentaire = new Commentaire;

        $formCommentaire = $this->createForm(CommentaireType::class, $commentaire);

        $formCommentaire->handleRequest($request);

        if ($formCommentaire->isSubmitted() && $formCommentaire->isValid()){

            $commentaire->setDateEnregistrement(new DateTimeImmutable());

            // dd($commentaire);

            $em->persist($commentaire);
            $em->flush();
        }


        // La méthode de requête findAll ne nous permet pas d'appliquer un orderby pour afficher les messages dans l'ordre du plus récent au plus ancien (desc), on peut éventuellement faire un array_reverse sur le résultat de la méthode findAll, sinon on peut utiliser findBy pour appliquer un orderBy
        // $commentaires = $commentaireRepository->findAll();
        // $commentaires = array_reverse($commentaires);
        $commentaires = $commentaireRepository->findBy([], ["date_enregistrement" => "desc"]);



        return $this->render('commentaire/index.html.twig', [
            "formCommentaire" => $formCommentaire,
            "commentaires" => $commentaires
        ]);
    }
}
