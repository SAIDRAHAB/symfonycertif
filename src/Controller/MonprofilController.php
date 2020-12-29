<?php

namespace App\Controller;


use App\Entity\Jeux;
use App\Form\JeuxType;
use App\Repository\JeuxRepository;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonprofilController extends AbstractController
{
    /**
     * @Route("/monprofil", name="monprofil", methods={"GET"})
     */
    public function index(JeuxRepository $jeuxRepository, UserRepository $user): Response
    {
        $user = $this->getUser();

        $repository = $this->getDoctrine()->getRepository(User::class);

        dump($repository);


        $Jeux = $this->getDoctrine()
            ->getRepository(Jeux::class);

        dump($Jeux);


        $listescore = $jeuxRepository->findBy(array('Userid' => $this->getUser()));
        dump($listescore);
        return $this->render('monprofil/index.html.twig', [
            'controller_name' => 'MonprofilController',
            'listescore' => $listescore,
            'user' => $user,

        ]);
    }
}
