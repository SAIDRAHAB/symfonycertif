<?php

namespace App\Controller;

use App\Entity\UploadGame;
use App\Repository\UploadGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixJeuxHomeController extends AbstractController //controlleur de la page choix des jeux
{
    /**
     * @Route("/choix/jeux/home", name="choix_jeux_home")
     */

    public function index(UploadGameRepository $uploadGameRepository): Response
    {
        return $this->render('choix_jeux_home/index.html.twig', [
            'upload_games' => $uploadGameRepository->findAll(),
        ]);
    }
}
