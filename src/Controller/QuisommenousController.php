<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuisommenousController extends AbstractController
{
    /**
     * @Route("/quisommenous", name="quisommenous")
     */
    public function index(): Response
    {
        return $this->render('quisommenous/index.html.twig', [
            'controller_name' => 'QuisommenousController',
        ]);
    }
}
