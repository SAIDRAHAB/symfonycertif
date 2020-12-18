<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MathgameController extends AbstractController
{
    /**
     * @Route("/mathgame", name="mathgame")
     */
    public function index(): Response
    {
        return $this->render('mathgame/index.html.twig', [
            'controller_name' => 'MathgameController',
        ]);
    }
}
