<?php
namespace App\Service;

use App\Entity\Projet;
use App\Entity\FondsAide;
use App\Repository\FondsAideRepository;



class WhichChoice 
{   
    private $id;
    private $fondsAideRepo;

    public function __construct(FondsAideRepository $fondsAideRepo){
        $this->fondsAideRepo = $fondsAideRepo;
    }
    public function  getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;

        return $this;
    }
    public function getFondsAideRepo()
    {
       return $this->fondsAideRepo;
    }

    public function setFondsAideRepo($fondsAideRepo)
    {
       $this->fondsAideRepo = $fondsAideRepo;

       return $this;
    }
    
    public function getInstanceProjet(){
       return new Projet();
    }
    public function getFondsAide(){
        return $this->fondsAideRepo->find($this->id);
    }
    public function getCorrectIdCommision(){
         $fondsAide = $this->getFondsAide();
         if( $fondsAide->getNom() === "Bourse Prémier court métrage" ){
            $TYPEFOND  = 1 ;
         }else if ($fondsAide->getNom() === "Création Images differentes et nouveaux médias"){
            $TYPEFOND  = 2 ;
         }else if($fondsAide->getNom() === "Ecriture et développement documentaire"){
            $TYPEFOND  = 3 ;
         }else {
            $TYPEFOND  = 4 ;
         }
         return $TYPEFOND;
    }
}
