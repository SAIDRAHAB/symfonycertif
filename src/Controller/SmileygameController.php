<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmileygameController extends AbstractController
{
    /**
     * @Route("/smileygame", name="smileygame")
     */
    public function index(): Response
    {
        return $this->render('smileygame/index.html.twig', [
            'controller_name' => 'SmileygameController',
        ]);
    }
}
