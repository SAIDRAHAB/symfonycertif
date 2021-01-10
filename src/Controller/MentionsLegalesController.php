<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentionsLegalesController extends AbstractController
{
    /**
     * @Route("/mentions-legales", name="mentionslegal")
     */
    public function index(): Response
    {
        return $this->render('mentionslegal/index.html.twig', [
            'controller_name' => 'MentionslegalController',
        ]);
    }
}
