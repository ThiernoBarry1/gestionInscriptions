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
    protected function getConfiguration($label,$placeholder='',$option=[]){
      return array_merge(['label'=>$label,'attr'=>['placeholder'=>$placeholder]
                 ],$option);
    }
}