<?php

namespace App\Controller;


use App\Entity\Evaluations;
use App\Form\EvaluationsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SuiviController extends AbstractController
{
    /**
     * @Route("/suiviajout", name="suiviajout") 
     */
    public function suiviajout(Request $request): Response //Ajout d'une evaluation(score) par l'orthophoniste
    {

        $user = $this->getUser();
        $jeux = new Evaluations();
        $jeux->setUser($user);

        $formulaire_contact = $this->createForm(EvaluationsType::class, $jeux);

        $formulaire_contact->handleRequest($request);
        if ($formulaire_contact->isSubmitted() && $formulaire_contact->isValid()) {
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
