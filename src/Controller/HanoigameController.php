<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HanoigameController extends AbstractController //controlleur du jeux hanoi
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
}
