<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HanoigameController extends AbstractController
{
    /**
     * @Route("/hanoigame", name="hanoigame")
     */
    public function index(): Response
    {
        return $this->render('hanoigame/index.html.twig', [
            'controller_name' => 'HanoigameController',
        ]);
    }
    

    
    /* 
    /**
     * @Route("/hanoigame/new")
     *//* 
    public function new(Request $request)
    {
        $score = new Jeux();
        $score->setTitre('Hanoi');
        $score->setScore($valeur);
    
    
        $score->handleRequest($request);
    
        
        $em = $this->getDoctrine()->getManager();
            
        $em->persist($score);
        $em->flush();
        
    
        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }  */
}
