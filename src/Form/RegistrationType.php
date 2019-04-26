<?php

namespace App\Form;

use App\Entity\Projet;
use App\Form\ConfigurationFildsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends ConfigurationFildsType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class,$this->getConfiguration('Titre du projet'))
            ->add('duree',TextType::class,$this->getConfiguration('Durée envisagée'))
            ->add('formatTournage',TextType::class,$this->getConfiguration('Format de tournage'))
            ->add('formatDefinitif',TextType::class,$this->getConfiguration('Format définitif'))
            ->add('genre',ChoiceType::class,
            ['choices'  => [
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ]]
             )
            ->add('synopsis',TextareaType::class,$this->getConfiguration('Synopsis (600 caractères maximum) '))
            ->add('adaptationOeuvre')
            ->add('deposant')
            ->add('typeAideLm')
            ->add('typeAideDoc')
            ->add('mtBudget')
            ->add('liensEligibilite')
            ->add('datePreparation')
            ->add('dateTournage')
            ->add('dateDiffusion')
            ->add('castingEnvisage')
            ->add('listeLiensTournage')
            ->add('nombreJoursTournage')
            ->add('nombreJoursTotal')
            ->add('droitArtistiqueTotalHt')
            ->add('droitArtistiqueTotalHtNormandie')
            ->add('personnelTotalHt')
            ->add('personnelTotalHtNormandie')
            ->add('interpretationTotalHt')
            ->add('interpretationTotalHtNormandie')
            ->add('totalChargeSocialesTotalHt')
            ->add('totalChargeSocialesTotalHtNormandie')
            ->add('decoEtCostumesTotalHt')
            ->add('decoEtCostumesTotalHtNormandie')
            ->add('transportTotalHt')
            ->add('transportTotalHtNormandie')
            ->add('moyenTechniqueTournageTotalHt')
            ->add('postProdTotalHt')
            ->add('moyenTechniqueTournageTotalHtNormandie')
            ->add('postProdTotalHtNormandie')
            ->add('assuranceEtFraisTotalHt')
            ->add('assuranceEtFraisTotalHtNormandie')
            ->add('fraisFinanciersTotalHt')
            ->add('fraisFinanciersTotalHtNormandie')
            ->add('fraisGenerauxTotalHt')
            ->add('fraisGenerauxTotalHtNormandie')
            ->add('imprevusTotalHt')
            ->add('imprevusTotalHtNormandie')
            ->add('totalGeneralTotalHt')
            ->add('totalGeneralTotalHtNormandie')
            ->add('financementAcquis')
            ->add('financementAcquisPrecision')
            ->add('depotProjetCollectivite')
            ->add('depotProjetCollectivitePrecision')
            ->add('projetDejaPresenteFondsAide')
            ->add('projetDejaPresenteFondsAideDate')
            ->add('projetDejaPresenteFondsAideTypeAide');
            /* ->add('session')
            ->add('producteur')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
