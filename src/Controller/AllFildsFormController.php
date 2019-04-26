<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Entity\FondsAide;
use App\Service\WhichChoice;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AllFildsFormController extends AbstractController
{
    /**
     * permet d'afficher le formulaire de saisie selon la commision.
     * la classe WhichChoice permet de d'ameliorer la ligibilité du controller et d'aléger 
     * son rôle.
     * @Route("/fonds-d-aide/{id}", name="all_filds_form")
     *
     * @param WhichChoice $choice
     * @param [integer] $id
     * @param ObjectManager $manager
     * @return Response
     */
    public function registration(WhichChoice $choice,$id,ObjectManager $manager)
    {
        $choice->setId($id);
        $whichCoice = $choice->getCorrectIdCommision();
        $projet  = $choice->getInstanceProjet();
        $fondsAide = $choice->getFondsAide();
        $allFildsForm =  $this->createForm(RegistrationType::class,$projet);
        return $this->render('all_filds_form/displayAllFilds.html.twig', [
            'allFildsForm' => $allFildsForm->createView(),
            'whichChoice' => $whichCoice,
            'fondsAide' => $fondsAide,
        ]);
    }
}
