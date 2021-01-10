<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Evaluations;
use App\Entity\Patient;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class EvaluationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $jeux = $options['data'];

        $builder
            ->add('Titre')
            ->add('Score')
            ->add('nom_prenom_patient', EntityType::class, [
                'class' => Patient::class,
                'choices' => $jeux->getUser()->getPatients(),
            ])
            ->add('age')
            ->add('commentaire')
            ->add('Enregistrer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evaluations::class,
        ]);
    }
}
