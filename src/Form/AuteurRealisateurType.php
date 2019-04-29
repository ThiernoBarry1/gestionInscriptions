<?php

namespace App\Form;

use App\Entity\AuteurRealisateur;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurRealisateurType extends ConfigurationFildsType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,$this->getConfiguration('Nom de l\'état civil'))
            ->add('prenom',TextType::class,$this->getConfiguration('Prénom'))
            ->add('pseudonyme',TextType::class,$this->getConfiguration('Pseudonyme'))
            ->add('adresse',TextType::class,$this->getConfiguration('Adresse'))
            ->add('codePostal',TextType::class,$this->getConfiguration('Code postal'))
            ->add('ville',TextType::class,$this->getConfiguration('Ville'))
            ->add('telephoneMobile',TextType::class,$this->getConfiguration('Télephone mobile'))
            ->add('courriel',TextType::class,$this->getConfiguration('Courriel'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AuteurRealisateur::class,
        ]);
    }
}
