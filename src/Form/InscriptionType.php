<?php

namespace App\Form;

use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;





class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
       
        ->add('nom', TextType::class, [
            'label' => 'First Name  '
        ])
        ->add('prenom', TextType::class, [
            'label' => 'last Name  '
        ])

            ->add('date_naissance')
            ->add('adress', TextType::class, [
                'label' => 'address   '
            ])
            ->add('code_postal')
            ->add('telephone', TelType::class, [
                'label' => 'phone'
            ])
            ->add('mail', EmailType::class, [
                'label' => ' mail'
            ])
            ->add('date_depart')
            ->add('date_arrive')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
