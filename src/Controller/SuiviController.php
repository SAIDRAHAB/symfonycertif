<?php

namespace App\Controller;


use App\Entity\Jeux;
use App\Entity\Patient;
use App\Entity\User;
use App\Form\AjoutPatientType;
use App\Form\JeuxType;
use App\Repository\JeuxRepository;
use App\Repository\PatientRepository;
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
    public function index(JeuxRepository $jeuxRepository, UserRepository $user, PatientRepository $patientRepository): Response
    {

        $user = $this->getUser();
        dump($user);

        dump($patientRepository);
        $listescore = $jeuxRepository->findBy(array('Userid' => $this->getUser()));

        return $this->render('suivi/index.html.twig', [
            'controller_name' => 'SuiviController',
            'listescore' => $listescore,
            'user' => $user,
            'listepatient' => $patientRepository->findByUser($user),
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

    /**
     * @Route("/patientajout", name="patientajout")
     */
    public function ajoutpatient(Request $request): Response
    {

        $user = $this->getUser();
        $patient = new Patient();
        $patient->setUser($user);
        dump($user);
        $formulaire_ajoutpatient = $this->createForm(AjoutPatientType::class, $patient);

        $formulaire_ajoutpatient->handleRequest($request);
        if ($formulaire_ajoutpatient->isSubmitted() && $formulaire_ajoutpatient->isValid()) {

            $patient = $formulaire_ajoutpatient->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($patient);
            $entityManager->flush();

            return $this->redirectToRoute('choix_jeux_home');
        }

        return $this->render('suivi/ajoutpatient.html.twig', [
            'form' => $formulaire_ajoutpatient->createView(),

            'user' => $user,
        ]);
    }
}
