<?php

namespace App\Controller;

use App\Repository\EvaluationRepository;
use App\Repository\PatientRepository;
use App\Repository\UserRepository;
use App\Entity\Evaluation;
use App\Form\EvaluationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SuiviController extends AbstractController
{
    /**
     * @Route("/suivi", name="suivi")
     */
    public function index(EvaluationRepository $jeuxRepository, UserRepository $user, PatientRepository $patientRepository): Response
    {

        $user = $this->getUser();

        $listescore = $jeuxRepository->findBy(array('user' => $this->getUser()));

        return $this->render('evaluation/index.html.twig', [
            'controller_name' => 'SuiviController',
            'listescore' => $listescore,
            'user' => $user
        ]);
    }

    /**
     * @Route("/suiviajout", name="suiviajout") 
     */
    public function suiviajout(Request $request): Response //Ajout d'une evaluation(score) par l'orthophoniste
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

        return $this->render('evaluation/ajoutscore.html.twig', [
            'controller_name' => 'MemoryController',
            'form' => $formulaire_contact->createView(),
        ]);
    }
}
