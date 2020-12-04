<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AdminFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class AdminController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * 
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

     /**
     * @Route("/admin/uploadgame", name="admin_uploadgame")
     * 
     * @IsGranted("ROLE_ADMIN")
     */
    public function create(): Response
    {
        $form = $this->createForm(AdminFormType::Class);

        return $this->render('admin/uploadgame.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView()
        ]);
    }
}
