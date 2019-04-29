<?php

namespace App\Form;

use App\Entity\Projet;
use App\Form\AuteurRealisateurType;
use App\Entity\DocumentAudioVisuels;
use App\Form\ConfigurationFildsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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
                [ 'choices'  => [
                  'Fiction' => true,
                  'Animation' => false,
                  'Documentaire' => false,
                  'Autre'=>false,
                  ],  'expanded' =>true
                ])
             ->add('genrePrecisionAutre',TextType::class,$this->getConfiguration('si autre, précisez *'))
            ->add('synopsis',TextareaType::class,$this->getConfiguration('Synopsis (600 caractères maximum) '))
            ->add('adaptationOeuvre',ChoiceType::class,
                        ['choices'  => 
                           [
                             'Oui' => true,
                              'Non' => false,
                           ],
                          'expanded' =>true
                        ],
                $this->getConfiguration('Adaptation d\'une oeuvre préexistante'))
            ->add('adaptationOeuvreToa',TextType::class,$this->getConfiguration('Titre de l\'oeuvre et l\'auteur *'))
            ->add('adaptationOeuvreDacp',TextType::class,$this->getConfiguration('Droits d\'adaptation cédés par *'))
            //->add('adaptationOeuvreDfc',)
            ->add('deposant',ChoiceType::class,
                ['choices'  => 
                    [
                     'Le producteur' => true,
                     'L\'auteur / le réalisateur ' => false,
                    ],
                 'expanded' =>true
                ],
               $this->getConfiguration('Projet déposé par'))
            ->add('typeAideLm',ChoiceType::class,
                    ['choices'  => 
                       [
                         'Ecriture' => true,
                         'Réécriture' => false,
                       ],
                     'expanded' =>true
                    ],
                $this->getConfiguration('Type d\'aide démandée'))
            ->add('typeAideDoc',ChoiceType::class,
                    ['choices'  => 
                        [
                          'Ecriture' => true,
                          'Développement' => false,
                        ],
                     'expanded' =>true
                   ],
                $this->getConfiguration('Type d\'aide démandée'))
            ->add('mtBudget',TextType::class,$this->getConfiguration('Pour les producteurs, montant du budget HT (écriture, réécriture ou développement'))
            ->add('liensEligibilite',ChoiceType::class,
                    ['choices'  => 
                        [
                          'à definir ' => true,
                          'à definir ' => false,
                       ],
                    ],
                    $this->getConfiguration('Liens d\'éligibilité'))
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
            ->add('projetDejaPresenteFondsAideTypeAide',TextType::class,$this->getConfiguration('Pour quel type d\'aide'))
            ->add('auteurRealisateurs',CollectionType::class,
                [
                 'entry_type'=>AuteurRealisateurType::class,
                 'allow_add'=>true,
                 'allow_delete'=>true
               ])
            ->add('documentAudioVisuels',CollectionType::class,
              [
                'entry_type'=>DocumentsAudioVisuelsType::class,
                'allow_add'=>true,
                'allow_delete'=>true
              ]
              )
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
