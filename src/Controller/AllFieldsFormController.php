<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Entity\FondsAide;
use App\Service\WhichCommissionChoice;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AllFieldsFormController extends AbstractController
{
    /**
     * permet d'afficher le formulaire de saisie selon la commision.
     * la classe WhichCommissionChoice permet d'ameliorer la ligibilité du controller et d'aléger 
     * son rôle.
     * @Route("/fonds-d-aide/{id}", name="all_filds_form")
     *
     * @param WhichCommissionChoice $choice
     * @param [integer] $id
     * @param ObjectManager $manager
     * @return Response
     */
    public function registration(WhichCommissionChoice $choice,$id,ObjectManager $manager)
    {
        $choice->setId($id);
        $whichChoice = $choice->getCorrectIdCommision();
        $projet  = $choice->getInstanceProjet();
        $fondsAide = $choice->getFondsAide();
        $allFieldsForm =  $this->createForm(RegistrationType::class,$projet);
        return $this->render('all_fields_form/displayAllFields.html.twig', [
            'allFieldsForm' => $allFieldsForm->createView(),
            'whichChoice' => $whichChoice,
            'fondsAide' => $fondsAide,
        ]);
    }
}
