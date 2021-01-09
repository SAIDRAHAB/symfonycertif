<?php

namespace App\Controller;

use App\Entity\UploadGame;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayController extends AbstractController
{
    /**
     * @Route("/play", name="play" )
     */
    public function index(): Response
    {

        return $this->render('play/index.html.twig', [
            'controller_name' => 'PlayController',

        ]);
    }
}
