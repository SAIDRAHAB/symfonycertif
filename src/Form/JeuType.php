<?php

namespace App\Form;

use App\Entity\Jeu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class JeuType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('Titre')
      ->add('Description')
      ->add('upload_file', FileType::class, [
        'label' => 'Fichier à Uploader',
        'mapped' => false,
        'required' => true,
        'constraints' => [
          new File([
            'mimeTypes' => [
              'text/javascript',
              'text/plain',
              'text/x-java',
            ],
            'mimeTypesMessage' => "Ce document est invalide",
          ])
        ],
      ])
      ->add('send', SubmitType::class);;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Jeu::class,
    ]);
  }
}
