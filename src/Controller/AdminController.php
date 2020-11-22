<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

     /**
     * @Route("/admin/create", name="admin_create")
     */
    public function create(): Response
    {
        $form = $this->createForm(AdminFormType::Class);

        return $this->render('admin/create.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView()
        ]);
    }
}
