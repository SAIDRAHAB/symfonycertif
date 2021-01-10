<?php

namespace App\Controller;

use App\Entity\Evaluations;
use App\Entity\UploadGame;
use App\Repository\UploadGameRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvaluationsController extends AbstractController //controlleur de la page choix des jeux
{
    /**
     * @Route("/jeux", name="choix_jeux_home")
     */

    public function index(UploadGameRepository $uploadGameRepository): Response
    {

        return $this->render('choix_jeux_home/index.html.twig', [
            'upload_games' => $uploadGameRepository->findAll(),
        ]);
    }

    /**
     * @Route("/jeux/{id}", name="play", methods={"GET","POST"})
     */
    public function play(UploadGame $uploadGame, Request $request): Response
    {

        $user = $this->getUser();
        $jeux = new Evaluations();
        $jeux->setUser($user);

        $formulaire_contact = $this->createForm(EvaluationsType::class, $jeux);

        $formulaire_contact->handleRequest($request);
        if ($formulaire_contact->isSubmitted() && $formulaire_contact->isValid()) {
            dump($jeux);
            $jeux = $formulaire_contact->getData();
            $jeux->setDate(new \DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jeux);
            $entityManager->flush();

            return $this->redirectToRoute('choix_jeux_home');
        }


        dump($uploadGame);
        $url = $uploadGame->getUrl();


        return $this->render('play/index.html.twig', [
            'uploadgame' => $uploadGame,
            'url' => $url,
            'form' => $formulaire_contact->createView(),
        ]);
    }
}
