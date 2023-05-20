<?php

namespace App\Form;

use App\Entity\Inscri;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('adresse')
            ->add('code_postal')
            ->add('ville')
            ->add('telephone')
            ->add('email')
            ->add('date_arrivee')
            ->add('date_depart')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscri::class,
        ]);
    }
}
