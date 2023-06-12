<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, [
                'label' => 'Nom de votre entreprise',
                'label_attr' => [
                    'class' => 'col-8'
                ],
                'attr' => [
                    'class' => 'col-7'
                ]
            ])
            ->add('Contact', TextType::class, [
                'label' => 'Votre nom',
                'label_attr' => [
                    'class' => 'col-8'
                ],
                'attr' => [
                    'class' => 'col-7'
                ]
            ])
            ->add('Telephone', TextType::class, [
                'label' => 'Téléphone',
                'label_attr' => [
                    'class' => 'col-8'
                ],
                'attr' => [
                    'class' => 'col-7'
                ]
            ])
            ->add('enregistrer', SubmitType::class, [
                'label' => 'Envoyer'
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
