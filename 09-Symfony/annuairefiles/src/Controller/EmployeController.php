<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EmployeController extends AbstractController
{
    #[Route('/employe/{id?}/{action?}', name: 'app_employe')]
    public function index(Request $request, EntityManagerInterface $em, EmployeRepository $employeRepository, $id, $action): Response
    {

        if (!empty($id)) {
            $employe = $employeRepository->find($id);
        } else {
            $employe = new Employe;
        }

        if(!empty($action) && $action == "delete") {
            $em->remove($employe);
            $em->flush();

            $this->addFlash("info", "L'employé a bien été supprimé");

            return $this->redirectToRoute("app_employe");
        }

        $formEmploye = $this->createForm(EmployeType::class, $employe);

        $formEmploye->handleRequest($request);

        if ($formEmploye->isSubmitted() && $formEmploye->isValid()) {
            $em->persist($employe);
            $em->flush();

            $this->addFlash("danger", "L'employé a bien été ajouté");
            return $this->redirectToRoute("app_employe");
        }

        $employes = $employeRepository->findAll();

        return $this->render('employe/index.html.twig', [
            "formEmploye" => $formEmploye,
            "employes" => $employes
        ]);
    }
}
