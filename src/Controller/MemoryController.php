<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemoryController extends AbstractController
{
    /**
     * @Route("/memory", name="memory")
     */
    public function index(): Response
    {
        return $this->render('memory/index.html.twig', [
            'controller_name' => 'MemoryController',
        ]);
    }
}
