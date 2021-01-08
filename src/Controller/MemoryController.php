<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Jeux;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\JeuxRepository;
use App\Form\JeuxType;
use App\Entity\User;

class MemoryController extends AbstractController //controlleur du jeu memory avec l'enregistrement du score en bdd
{
    /**
     * @Route("/memory", name="memory")
     */
    public function index(Request $request): Response
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

        return $this->render('memory/index.html.twig', [
            'controller_name' => 'MemoryController',
            'form' => $formulaire_contact->createView(),
        ]);
    }
}
