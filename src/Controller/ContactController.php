<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController //controller page de contact avec envoi de mail
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer)
    {



        $formulaire_contact = $this->createFormBuilder()
            ->add('email', EmailType::class)
            ->add('sujet', TextType::class)
            ->add('message', TextareaType::class)
            ->add('Envoyer', SubmitType::class)
            ->getForm();

        $contact = $formulaire_contact->handleRequest($request);

        if ($formulaire_contact->isSubmitted() && $formulaire_contact->isValid()) {
            $email = (new TemplatedEmail())
                ->from('admin@said-rahab.fr')
                ->to('admin@said-rahab.fr')
                ->subject('Message du formulaire de contact')
                ->htmlTemplate('contact/contact.html.twig')
                ->context([
                    'mail' => $contact->get('email')->getData(),
                    'sujet' => $contact->get('sujet')->getData(),
                    'message' => $contact->get('message')->getData(),
                ]);

            $mailer->send($email);

            $this->addFlash('message', 'Mail envoyé');
            return $this->redirectToRoute('contact');
        }


        return $this->render('contact/index.html.twig', [

            'contact_formulaire' => $formulaire_contact->createView(),
        ]);
    }
}
