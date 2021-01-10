<?php

namespace App\Controller;


use App\Repository\JeuxRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonProfilController extends AbstractController //controlleur de la page profil
{
    /**
     * @Route("/mon-profil", name="monprofil", methods={"GET"})
     */
    public function index(JeuxRepository $jeuxRepository, UserRepository $user): Response
    {
        $user = $this->getUser();


        $listescore = $jeuxRepository->findBy(array('Userid' => $this->getUser()));
        return $this->render('monprofil/index.html.twig', [
            'listescore' => $listescore,
            'user' => $user,
        ]);
    }
}
