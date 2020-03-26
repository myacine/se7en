<?php

namespace App\Controller;

use App\Entity\Emplacement;
use App\Form\EmplacementFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmplacementController extends AbstractController
{
    /**
     * @Route("/home/emplacement/add", name="add_emplacement")
     */
    public function add(Request $request)
    {
        $emplacement = new Emplacement();
        $form = $this->createForm(EmplacementFormType::class, $emplacement);
        $entityManager = $this->getDoctrine()->getManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $entityManager->persist($formData);
            $entityManager->flush();
            $this->addFlash('success', 'Emplacement ajouté avec succès');
            return $this->redirectToRoute('produit');
        }
        return $this->render('emplacement/add/index.html.twig', [
            'controller_name' => 'EmplacementController',
            'form' => $form->createView()
        ]);
    }
}
