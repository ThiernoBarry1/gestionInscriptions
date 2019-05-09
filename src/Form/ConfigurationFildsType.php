<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;

class ConfigurationFildsType extends AbstractType {
    /**
     * permet de configurer un champs.
     *      
     * @param [String] $label
     * @param [String] $placeholder
     * @param array $option
     * @return Array
     */
    protected function getConfiguration($label,$placeholder='',$option=[])
    {
      return array_merge(['label'=>$label,'attr'=>['placeholder'=>$placeholder]
                 ],$option);
    }

    /**
    * Permet de remplir un tableau de nombres corespondants à des dates
    *@return Array
    */
    protected function getArrayDate()
    {
      
        $arrayDate = ['1950'=>false];
        for($i=1951;$i<=2100;$i++) {
          $arrayDate[] = false;
        }
        return $arrayDate;
    }
    /**
     * return le tableau de choix
     *
     * @param [Array] $array
     * @return Array
     */
    protected function getArrayChoice($array)
    {
       return  ['choices'  => 
                     $array,
                  'expanded' =>true
                ];
          
    }
}