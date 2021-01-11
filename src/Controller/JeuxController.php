<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Form\EvaluationType;
use App\Entity\Jeu;
use App\Repository\JeuRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JeuxController extends AbstractController //controlleur de la page choix des jeux
{
    /**
     * @Route("/jeux", name="choix_jeux_home")
     */

    public function index(JeuRepository $uploadGameRepository): Response
    {

        return $this->render('choix_jeux_evaluation/index.html.twig', [
            'upload_games' => $uploadGameRepository->findAll(),
        ]);
    }

    /**
     * @Route("/jeux/{id}", name="play", methods={"GET","POST"})
     */
    public function play(Jeu $uploadGame, Request $request): Response
    {
        $user = $this->getUser();
        $jeux = new Evaluation();
        $jeux->setUser($user);

        $formulaire_contact = $this->createForm(EvaluationType::class, $jeux);
        $formulaire_contact->handleRequest($request);
        if ($formulaire_contact->isSubmitted() && $formulaire_contact->isValid()) {
            $jeux = $formulaire_contact->getData();
            $jeux->setDate(new \DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jeux);
            $entityManager->flush();

            return $this->redirectToRoute('choix_jeux_home');
        }

        $url = $uploadGame->getUrl();

        return $this->render('play/index.html.twig', [
            'uploadgame' => $uploadGame,
            'url' => $url,
            'form' => $formulaire_contact->createView(),
        ]);
    }
}
