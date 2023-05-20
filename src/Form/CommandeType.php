<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;




class CommandeType extends AbstractType
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
            ->add('ville', TextType::class, [
                'label' => 'city  '
            ])
            ->add('telephone')
            ->add('telephone', TelType::class, [
                'label' => 'phone '
            ])
            ->add('methode_paiement', ChoiceType::class, [
                'label' => 'method',
                'choices' => [
                    'Cash' => 'Cash',
                    'Debit cards' => 'Debit cards',
                    'Credit cards' => 'Credit cards',
                ]
            ])
            ->add('article')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
