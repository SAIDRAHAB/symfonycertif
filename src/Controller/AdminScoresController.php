<?php

namespace App\Controller;

use App\Entity\Evaluations;
use App\Form\EvaluationsType;
use App\Repository\EvaluationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/scores")
 */
class AdminScoresController extends AbstractController //controlleur de l'ajout des jeux par l'admin
{
    /**
     * @Route("/", name="jeux_index", methods={"GET"})
     */
    public function index(EvaluationsRepository $jeuxRepository): Response
    {
        return $this->render('jeux/index.html.twig', [
            'jeuxobjet' => $jeuxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="jeux_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $jeux = new Evaluations();
        $form = $this->createForm(EvaluationsType::class, $jeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jeux->setDate(new \DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jeux);
            $entityManager->flush();

            return $this->redirectToRoute('jeux_index');
        }

        return $this->render('jeux/new.html.twig', [
            'jeux' => $jeux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jeux_show", methods={"GET"})
     */
    public function show(Evaluations $jeux): Response
    {
        return $this->render('jeux/show.html.twig', [
            'jeux' => $jeux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="jeux_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Evaluations $jeux): Response
    {
        $form = $this->createForm(EvaluationsType::class, $jeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jeux_index');
        }

        return $this->render('jeux/edit.html.twig', [
            'jeux' => $jeux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jeux_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Evaluations $jeux): Response
    {
        if ($this->isCsrfTokenValid('delete' . $jeux->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($jeux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('jeux_index');
    }
}