<?php

namespace App\Controller;

use App\Entity\UploadGame;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayController extends AbstractController
{
    /**
     * @Route("/play/{id}", name="play", methods={"GET"})
     */
    public function index(UploadGame $uploadGame): Response
    {

        dump($uploadGame);
        $url = $uploadGame->getUrl();


        return $this->render('play/index.html.twig', [
            'uploadgame' => $uploadGame,
            'url' => $url,
        ]);
    }
}
