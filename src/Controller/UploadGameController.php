<?php

namespace App\Controller;

use App\Entity\UploadGame;
use App\Form\UploadGameType;
use App\Repository\UploadGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/upload/game")
 */
class UploadGameController extends AbstractController
{
    /**
     * @Route("/", name="upload_game_index", methods={"GET"})
     */
    public function index(UploadGameRepository $uploadGameRepository): Response
    {
        return $this->render('upload_game/index.html.twig', [
            'upload_games' => $uploadGameRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="upload_game_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $uploadGame = new UploadGame();
        $form = $this->createForm(UploadGameType::class, $uploadGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uploadGame);
            $entityManager->flush();

            return $this->redirectToRoute('upload_game_index');
        }

        return $this->render('upload_game/new.html.twig', [
            'upload_game' => $uploadGame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="upload_game_show", methods={"GET"})
     */
    public function show(UploadGame $uploadGame): Response
    {
        return $this->render('upload_game/show.html.twig', [
            'upload_game' => $uploadGame,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="upload_game_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UploadGame $uploadGame): Response
    {
        $form = $this->createForm(UploadGameType::class, $uploadGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('upload_game_index');
        }

        return $this->render('upload_game/edit.html.twig', [
            'upload_game' => $uploadGame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="upload_game_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UploadGame $uploadGame): Response
    {
        if ($this->isCsrfTokenValid('delete'.$uploadGame->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($uploadGame);
            $entityManager->flush();
        }

        return $this->redirectToRoute('upload_game_index');
    }
}