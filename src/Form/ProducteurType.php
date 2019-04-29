<?php

namespace App\Form;

use App\Entity\Producteur;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProducteurType extends ConfigurationFildsType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,$this->getConfiguration('Nom de la structure'))
            ->add('nature',TextType::class,$this->getConfiguration('Nature juridique de la structure'))
            ->add('siret',TextType::class,$this->getConfiguration('N° de SIRET'))
            ->add('nomGerant',TextType::class,$this->getConfiguration('Gérant/Président','Le nom'))
            ->add('prenomGerant',TextType::class,$this->getConfiguration('','le prenom'))
            ->add('nomProducteur',TextType::class,$this->getConfiguration('Producteur','Le nom'))
            ->add('prenomProducteur',TextType::class,$this->getConfiguration('','Le prenom'))
            ->add('personneChargee',TextType::class,$this->getConfiguration('Personne charge du dossier (si différent)'))
            ->add('adresse',TextType::class,$this->getConfiguration('Adresse (siège social'))
            ->add('codePostal',TextType::class,$this->getConfiguration('Code postal'))
            ->add('ville',TextType::class,$this->getConfiguration('Ville'))
            ->add('adresseBureau',TextType::class,$this->getConfiguration('Adresse bureau (si différent du siège social) '))
            ->add('codePostaleBureau',TextType::class,$this->getConfiguration('Code postal'))
            ->add('villeBureau',TextType::class,$this->getConfiguration('Ville'))
            ->add('telephoneFixe',TextType::class,$this->getConfiguration('Télephone fixe'))
            ->add('telephoneMobile',TextType::class,$this->getConfiguration('Télephone mobile'))
            ->add('courriel',TextType::class,$this->getConfiguration('Courriel'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producteur::class,
        ]);
    }
}
