<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientFormType;
use App\Form\FindClientFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientsController extends AbstractController
{
    /**
     * @Route("/admin/clients", name="clients")
     */
    public function list()
    {
        $clients = $this->getDoctrine()->getRepository(Client::class, null)->findAll();
        return $this->render('clients/index.html.twig', [
            'controller_name' => 'ClientsController',
            'titre' => 'Liste des clients',
            'clients' => $clients
        ]);
    }


    /**
     * @Route("/admin/clients/blacklist/add/{id}", name="black_list_clients")
     */
    public function blackList(Request $request, $id = null)
    { 
        $client = new Client();
        $client = $this->getDoctrine()->getRepository(Client::class, null)->findOneBy(['id' => $id]);
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(ClientFormType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $entityManager->persist($formData);
            $entityManager->flush();
            $this->addFlash('success', 'Client ajouté a la black liste avec succés');
            return $this->redirectToRoute('clients');
        }
        return $this->render('clients/edit/index.html.twig', [
            'controller_name' => 'ClientsController',
            'titre' => 'Black lister client',
            'form' => $form->createView(),
            'client' => $client
        ]);
    }

    /**
     * @Route("/admin/clients/blacklist/find/", name="find_black_list_clients")
     */
    public function findandblackList(Request $request)
    { 
        $client = new Client();       
        $form = $this->createForm(FindClientFormType::class, null, [
            'action' => $this->generateUrl('find_black_list_clients'),
            'method' => 'POST',
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $formData = $form->getData();
            $client = $this->getDoctrine()->getRepository(Client::class, null)->findOneBy(['id' => $formData['id']]);
            if (isset($client) && !empty($client)) {
                return $this->redirectToRoute('black_list_clients', array('id' => $formData['id']));
            }else{
            $this->addFlash('error', 'Client introuvable');
            }
        }
        
            return $this->render('clients/find/index.html.twig', [
                'controller_name' => 'ClientsController',
                'titre' => 'Black lister client',
                'form' => $form->createView(),
            ]);
    }
}
