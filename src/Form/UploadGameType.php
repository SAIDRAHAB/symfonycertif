<?php

namespace App\Form;

use App\Entity\UploadGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class UploadGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titre')
            ->add('Description')
            ->add('upload_file', FileType::class, [
                'label' => 'Fichier à Uploader',
                'mapped' => false, // Tell that there is no Entity to link
                'required' => true,
                'constraints' => [
                  new File([ 
                    'mimeTypes' => [ // We want to let upload only txt, csv or Excel files
                      'text/javascript', 
                      'text/plain',
                      'text/x-java',
                    ],
                    'mimeTypesMessage' => "This document isn't valid.",
                  ])
                ],
              ])
              ->add('send', SubmitType::class); // We could have added it in the view, as stated in the framework recommendations
 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UploadGame::class,
        ]);
    }
}
