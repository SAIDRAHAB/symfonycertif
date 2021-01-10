<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\AjoutPatientType;
use App\Repository\PatientRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PatientsController extends AbstractController
{
    /**
     * @Route("/patients", name="patients")
     */
    public function index(UserRepository $user, PatientRepository $patientRepository): Response
    {

        $user = $this->getUser();

        return $this->render('patient/index.html.twig', [
            'controller_name' => 'SuiviController',
            'user' => $user,
            'listepatient' => $patientRepository->findByUser($user),
        ]);
    }

    /**
     * @Route("/patientajout", name="patientajout")
     */
    public function ajoutpatient(Request $request): Response //Ajout de patient par l'orthophoniste
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

        return $this->render('patient/ajoutpatient.html.twig', [
            'form' => $formulaire_ajoutpatient->createView(),
            'user' => $user,
        ]);
    }
}
