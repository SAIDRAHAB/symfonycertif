<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageprincipalController extends AbstractController
{
    /**
     * @Route("/pageprincipal", name="pageprincipal")
     */
    public function index(): Response
    {
        return $this->render('pageprincipal/index.html.twig', [
            'controller_name' => 'PageprincipalController',
        ]);
    }
}
