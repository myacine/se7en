<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\TestFormType;
use Monolog\Test\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    /**
     * @Route("/erp/test", name="test")
     */
    public function index(Request $request)
    {
        $test = new Test();
        $form = $this->createForm(TestFormType::class, $test);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //dump($form);
            //die();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($test);
            $entityManager->flush();
        }
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController', 
            'form' => $form->createView()
        ]);
    }
}
