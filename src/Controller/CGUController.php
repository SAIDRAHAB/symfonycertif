<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CguController extends AbstractController
{
    /**
     * @Route("/cgu", name="c_g_u")
     */
    public function index(): Response
    {
        return $this->render('cgu/index.html.twig', []);
    }
}
