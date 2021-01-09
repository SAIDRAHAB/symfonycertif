<?php

namespace App\Controller;

use App\Entity\Jeux;
use App\Form\JeuxType;
use App\Entity\UploadGame;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayController extends AbstractController
{
    /**
     * @Route("/play/{id}", name="play", methods={"GET"})
     */
    public function index(UploadGame $uploadGame, Request $request): Response
    {

        $user = $this->getUser();
        $jeux = new Jeux();
        $jeux->setUserid($user);

        $formulaire_contact = $this->createForm(JeuxType::class, $jeux);

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
