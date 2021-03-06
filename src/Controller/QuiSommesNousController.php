<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuiSommesNousController extends AbstractController //controlleur page qui somme nous
{
    /**
     * @Route("/qui-sommes-nous", name="quisommenous")
     */
    public function index(): Response
    {
        return $this->render('quisommenous/index.html.twig', [
            'controller_name' => 'QuisommenousController',
        ]);
    }
}
