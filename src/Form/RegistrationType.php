<?php

namespace App\Form;

use App\Entity\Projet;
use App\Form\ProducteurType;
use App\Entity\AuteurRealisateur;
use App\Form\AuteurRealisateurType;
use App\Entity\DocumentAudioVisuels;
use App\Form\ConfigurationFildsType;
use App\Form\DocumentsAudioVisuelsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationType extends ConfigurationFildsType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('duree',TextType::class)
            ->add('formatTournage',TextType::class)
            ->add('formatDefinitif',TextType::class)
            ->add('genre',ChoiceType::class,
                [ 'choices'  => [
                  'Fiction' => true,
                  'Animation' => false,
                  'Documentaire' => false,
                  'Autre'=>false,
                  ],  'expanded' =>true
                ])
             ->add('genrePrecisionAutre',TextType::class)
            ->add('synopsis',TextareaType::class)
            ->add('adaptationOeuvre',ChoiceType::class,
                        ['choices'  => 
                           [
                             'Oui' => true,
                              'Non' => false,
                           ],
                          'expanded' =>true
                        ])
            ->add('adaptationOeuvreToa',TextType::class)
            ->add('adaptationOeuvreDacp',TextType::class)
            //->add('adaptationOeuvreDfc',)
            ->add('deposant',ChoiceType::class,
                ['choices'  => 
                    [
                     'Le producteur' => true,
                     'L\'auteur / le réalisateur ' => false,
                    ],
                 'expanded' =>true
                ])
               ->add('producteurs',CollectionType::class,
                [
                'entry_type'=>ProducteurType::class
                ]
              )
              ->add('auteurRealisateurs',CollectionType::class,
                 [
                   'entry_type'=>AuteurRealisateurType::class,
                   'allow_add'=>true,
                   'allow_delete'=>true,
                 ])
                 ->add('documentAudioVisuels',CollectionType::class,
                 [
                   'entry_type'=>DocumentsAudioVisuelsType::class,
                   'allow_add'=>true,
                   'allow_delete'=>true,
                 ])
               ->add('typeAideLm',ChoiceType::class,
                    ['choices'  => 
                       [
                         'Écriture' => true,
                         'Réécriture' => false,
                       ],
                     'expanded' =>true
                    ])
            ->add('typeAideDoc',ChoiceType::class,
                    ['choices'  => 
                        [
                          'Écriture' => true,
                          'Développement' => false,
                        ],
                     'expanded' =>true
                   ])
            ->add('mtBudget',TextType::class)
            ->add('liensEligibilite',ChoiceType::class,
                    ['choices'  => 
                        [
                          'auteur réalisateur domicilié en région' => true,
                          'société de production disposant d’un établissement stable en région' => false,
                          'projet entretenant un lien culturel avec le territoire régional' =>false,
                       ],
                    ])
            ->add('datePreparation',TextType::class)
            ->add('dateTournage',TextType::class)
            ->add('dateDiffusion',TextType::class)
            ->add('castingEnvisage',TextType::class)
            ->add('listeLiensTournage',TextareaType::class)
            ->add('nombreJoursTournage',TextType::class)
            ->add('nombreJoursTotal',TextType::class)
            ->add('droitArtistiqueTotalHt',TextType::class)
            ->add('droitArtistiqueTotalHtNormandie',TextType::class)
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
            ->add('financementAcquisPrecision',TextType::class)
            ->add('montantSollicite',TextType::class)
            ->add('depotProjetCollectivite')
            ->add('depotProjetCollectivitePrecision',TextType::class)
            ->add('projetDejaPresenteFondsAide')
            ->add('projetDejaPresenteFondsAideDate',TextType::class)
            ->add('projetDejaPresenteFondsAideTypeAide',TextType::class)  
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
