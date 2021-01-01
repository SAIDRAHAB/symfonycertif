<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class FileUploadType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('upload_file', FileType::class, [
        'label' => false,
        'mapped' => false, // pas d'entité a qui se lier
        'required' => true,
        'constraints' => [
          new File([
            'mimeTypes' => [ // seulement les fichier de type js
              'text/javascript',
              'text/plain',
            ],
            'mimeTypesMessage' => "le document est invalide",
          ])
        ],
      ])
      ->add('send', SubmitType::class); // We could have added it in the view, as stated in the framework recommendations
  }
}
