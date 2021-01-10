<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeveloppeurInfoController extends AbstractController
{
    /**
     * @Route("/developpeur-info", name="developpeurinfo")
     */
    public function index(): Response
    {
        return $this->render('developpeurinfo/index.html.twig', [
            'controller_name' => 'DeveloppeurinfoController',
        ]);
    }
}
