<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ErpController extends AbstractController
{
    /**
     * @Route("/erp", name="erp")
     */
    public function index()
    {
        return $this->render('erp/index.html.twig', [
            'controller_name' => 'ErpController',
        ]);
    }
    
     /**
      * @Route("/home", name="home")
      */
    public function home()
    {
        return $this->render('erp/home.html.twig', [
            'controller_name' => 'ErpController',
            'title' => "Welcome to BATOLIS ERP"
        ]);
    }

     /**
      * @Route("/AddProducts", name="AddProducts")
      */
    public function AddProducts()
    {
        return $this->render('erp/AddProducts.html.twig', [
            'controller_name' => 'ErpController',
            'title' => "Ajouter un produit"
        ]);
    }

     /**
      * @Route("/AddStorageLocation", name="AddStorageLocation")
      */
    public function AddStorageLocation()
    {
        return $this->render('erp/AddStorageLocation.html.twig', [
            'controller_name' => 'ErpController',
            'title' => "Ajouter un lieu de stockage"
        ]);
    }

     /**
      * @Route("/commandes", name="commandes")
      */
      public function commandes()
      {
          return $this->render('erp/commandes.html.twig', [
              'controller_name' => 'ErpController',
              'title' => "Commandes"
          ]);
      }
}
