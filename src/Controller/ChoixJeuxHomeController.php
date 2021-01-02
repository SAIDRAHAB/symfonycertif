<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixJeuxHomeController extends AbstractController //controlleur de la page choix des jeux
{
    /**
     * @Route("/choix/jeux/home", name="choix_jeux_home")
     */
    public function index(): Response
    {
        return $this->render('choix_jeux_home/index.html.twig', [
            'controller_name' => 'ChoixJeuxHomeController',
        ]);
    }
}
