<?php

namespace App\Form;

use App\Entity\DocumentAudioVisuels;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class DocumentsAudioVisuelsType extends ConfigurationFildsType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class,$this->getConfiguration('Titre'))
            ->add('realisateur',TextType::class,$this->getConfiguration('Réalisateur'))
            ->add('genre',TextType::class,$this->getConfiguration('Genre'))
            ->add('annee',TextType::class,$this->getConfiguration('Année'))
            ->add('duree',TextType::class,$this->getConfiguration('Durée'))
            ->add('lien',TextType::class,$this->getConfiguration('Lien'))
            ->add('motDePasse',PasswordType::class,$this->getConfiguration('Mot de passe'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentAudioVisuels::class,
        ]);
    }
}
