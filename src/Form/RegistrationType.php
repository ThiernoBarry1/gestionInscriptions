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
             ->add('genrePrecisionAutre',TextType::class,$this->getConfiguration('si autre, précisez *'))
            ->add('synopsis',TextareaType::class,$this->getConfiguration('Synopsis (600 caractères maximum) '))
            ->add('adaptationOeuvre')
            ->add('adaptationOeuvreToa',TextType::class,$this->getConfiguration('Titre de l\'oeuvre et l\'auteur *'))
            ->add('adaptationOeuvreDacp',TextType::class,$this->getConfiguration('Droits d\'adaptation cédés par *'))
            //->add('adaptationOeuvreDfc',)
            ->add('deposant')
            ->add('typeAideLm')
            ->add('typeAideDoc')
            ->add('mtBudget',TextType::class,$this->getConfiguration('Pour les producteurs, montant du budget HT (écriture, réécriture ou développement'))
            ->add('liensEligibilite',ChoiceType::class,$this->getConfiguration('Liens d\'éligibilité'))
            ->add('datePreparation',TextType::class,$this->getConfiguration('Date de préparation'))
            ->add('dateTournage',TextType::class,$this->getConfiguration('Date de tournage'))
            ->add('dateDiffusion',TextType::class,$this->getConfiguration('Date de  diffusion'))
            ->add('castingEnvisage',TextType::class,$this->getConfiguration('Casting envisagé'))
            ->add('listeLiensTournage',TextareaType::class,$this->getConfiguration('Liste des lieux de tournage envisagé en Normandie'))
            ->add('nombreJoursTournage',TextType::class,$this->getConfiguration('Nombre de jours de tournage prévus en Normandie'))
            ->add('nombreJoursTotal',TextType::class,$this->getConfiguration('Nombre de jours total de tournage'))
            ->add('droitArtistiqueTotalHt',TextType::class,$this->getConfiguration('Total HT'))
            ->add('droitArtistiqueTotalHtNormandie',TextType::class,$this->getConfiguration('Dont en région Normandie HT'))
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
            ->add('financementAcquisPrecision',TextType::class,$this->getConfiguration('Si oui, lesquels'))
            ->add('montantSollicite',TextType::class,$this->getConfiguration('Montant sollicité au Fonds d\'aide Normandie'))
            ->add('depotProjetCollectivite')
            ->add('depotProjetCollectivitePrecision',TextType::class,$this->getConfiguration('Si oui, lesquelles'))
            ->add('projetDejaPresenteFondsAide')
            ->add('projetDejaPresenteFondsAideDate',TextType::class,$this->getConfiguration('Si oui, à quelle date'))
            ->add('projetDejaPresenteFondsAideTypeAide',TextType::class,$this->getConfiguration('Pour quel type d\'aide'));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
