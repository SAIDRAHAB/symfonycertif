<?php

namespace App\Controller;


use App\Entity\Jeux;

use App\Entity\User;
use App\Form\JeuxType;
use App\Repository\JeuxRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SuiviController extends AbstractController
{
    /**
     * @Route("/suivi", name="suivi")
     */
    public function index(JeuxRepository $jeuxRepository, UserRepository $user): Response
    {

        $user = $this->getUser();

        $repository = $this->getDoctrine()->getRepository(User::class);
        $Jeux = $this->getDoctrine()->getRepository(Jeux::class);


        $listescore = $jeuxRepository->findBy(array('Userid' => $this->getUser()));
    
        return $this->render('suivi/index.html.twig', [
            'controller_name' => 'SuiviController',
            'listescore' => $listescore,
            'user' => $user,
        ]);
    }

     /**
     * @Route("/suiviajout", name="suiviajout")
     */
    public function suiviajout(Request $request): Response
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

        return $this->render('suivi/ajoutscore.html.twig', [
            'controller_name' => 'MemoryController',
            'form' => $formulaire_contact->createView(),
        ]);
    }

}
