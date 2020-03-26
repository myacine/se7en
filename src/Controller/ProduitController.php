<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProductType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends AbstractController
{
    /**
     * @Route("/admin/produit/edit/{id}", name="edit_produit")
     */
    public function edit(Request $request, $id)
    {
        
        $produit = new Produit();
        $produit = $this->getDoctrine()->getRepository(Produit::class, null)->findOneBy(['id' => $id]);
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(ProductType::class, $produit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $entityManager->persist($formData);
            $entityManager->flush();
            $this->addFlash('success', 'Produit modifié avec succés');
            return $this->redirectToRoute('produit');
        }
        return $this->render('produit/edit/index.html.twig', [
            'controller_name' => 'Produits',
            'form' => $form->createView(),
            'produit' => $produit
        ]);
    }
    /**
     * @Route("/admin/produit/add", name="add_produit")
     */
    public function add(Request $request)
    {
        
        $produit = new Produit();
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(ProductType::class, $produit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $entityManager->persist($formData);
            $entityManager->flush();
            $this->addFlash('success', 'Produit ajouté avec succés');
            return $this->redirectToRoute('produit');
        }
        return $this->render('produit/add/index.html.twig', [
            'controller_name' => 'Produits',
            'form' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/admin/produit", name="produit")
     */
    public function list()
    {
        $produits = $this->getDoctrine()->getRepository(Produit::class, null)->findAll();
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'Produits',
            'titre' => 'Liste des produits',
            'produits' => $produits
        ]);
    }

    /**
     * @Route("/admin/produit/sold_out", name="soldout_produit")
     */
    public function soldOut()
    {
        $produits = $this->getDoctrine()->getRepository(Produit::class, null)->findBy(['quantite' => 0]);
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'Produits en repture de stock',
            'titre' => 'Produits en repture de stock',
            'produits' => $produits
        ]);
    }
}
