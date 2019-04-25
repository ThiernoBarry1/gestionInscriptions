<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Session;
use App\Entity\FondsAide;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GesitionIncriptionFixtures extends Fixture
{   
/**
 * permet de créer les entity en dur pour commencer.
 *
 * @param ObjectManager $manager
 * @return void
 */
    public function load(ObjectManager $manager)
    {   
        $fondsAideBourse = new FondsAide();
        $session1 = new Session();
        $session1->setNom('session 1')
                 ->setDateDebut(new DateTime('2019-01-14'))
                 ->setDateFin(new DateTime('2019-01-31'))
                 ->setPreselection(new DateTime('2019-03-14'))
                 ->setPleniere(new DateTime('2019-04-02'))
                 ->setFondsAide($fondsAideBourse);
        $session2 = new Session();
        $session2->setNom('session 2')
                 ->setDateDebut(new DateTime('2019-06-7'))
                 ->setDateFin(new DateTime('2019-06-7'))
                 ->setPreselection(new DateTime('2019-08-28'))
                 ->setPleniere(new DateTime('2019-09-12'))
                 ->setFondsAide($fondsAideBourse);
        $manager->persist($session1);
        $manager->persist($session2);
        $fondsAideBourse->setNom("Bourse Prémier court métrage")
                       ->addSession($session1)
                       ->addSession($session2);
        $manager->persist($fondsAideBourse);
        $fondsAideCreation = new FondsAide();
        $session1 = new Session();
        $session1->setNom('session 1')
                 ->setDateDebut(new DateTime('2018-11-22'))
                 ->setDateFin(new DateTime('2018-12-06'))
                 ->setPreselection(new DateTime('2019-01-10'))
                 ->setPleniere(new DateTime('2019-01-24'))
                 ->setFondsAide($fondsAideCreation);
        $session2 = new Session();
        $session2->setNom('session 2')
                 ->setDateDebut(new DateTime('2019-04-25'))
                 ->setDateFin(new DateTime('2019-05-09'))
                 ->setPreselection(new DateTime('2019-06-17'))
                 ->setPleniere(new DateTime('2019-07-09 '))
                 ->setFondsAide($fondsAideCreation);
        $manager->persist($session1);
        $manager->persist($session2);
        
        $fondsAideCreation->setNom(" Création Images differentes et nouveaux médias")
                         ->addSession($session1)
                         ->addSession($session2);
        $manager->persist($fondsAideCreation);
        $fondsAideEdd = new FondsAide();
        $session1 = new Session();
        $session1->setNom('session 1')
                 ->setDateDebut(new DateTime('2019-01-11'))
                 ->setDateFin(new DateTime('2019-01-25'))
                 ->setPreselection(new DateTime('2019-02-21'))
                 ->setPleniere(new DateTime('2019-03-12'))
                 ->setFondsAide($fondsAideEdd);
        $session2 = new Session();
        $session2->setNom('session 2')
                 ->setDateDebut(new DateTime('2019-05-06'))
                 ->setDateFin(new DateTime('2019-05-20 '))
                 ->setPreselection(new DateTime('2019-06-20'))
                 ->setPleniere(new DateTime('2019-07-10'))
                 ->setFondsAide($fondsAideEdd);
        $manager->persist($session1);
        $manager->persist($session2);
        $fondsAideEdd->setNom(" Ecriture et développement documentaire")
                     ->addSession($session1)
                     ->addSession($session2);
        $manager->persist($fondsAideEdd);
        $fondsAideErlc = new FondsAide();
        $session1 = new Session();
        $session1->setNom('session 1')
                 ->setDateDebut(new DateTime('2018-09-27'))
                 ->setDateFin(new DateTime('2018-10-11'))
                 ->setPreselection(new DateTime('2018-11-13'))
                 ->setPleniere(new DateTime('2018-12-18'))
                 ->setFondsAide($fondsAideErlc);
        $session2 = new Session();
        $session2->setNom('session 2')
                 ->setDateDebut(new DateTime('2019-01-04'))
                 ->setDateFin(new DateTime('2019-01-18'))
                 ->setPreselection(new DateTime('2019-02-18'))
                 ->setPleniere(new DateTime('2019-03-19'))
                 ->setFondsAide($fondsAideErlc);
        $session3 = new Session();
        $session3->setNom('session 3')
                 ->setDateDebut(new DateTime('2019-04-19'))
                 ->setDateFin(new DateTime('2019-05-03'))
                 ->setPreselection(new DateTime('2019-06-11'))
                 ->setPleniere(new DateTime('2019-07-11'))
                 ->setFondsAide($fondsAideErlc);
        $manager->persist($session1);
        $manager->persist($session2);
        $manager->persist($session3);
        $fondsAideErlc->setNom(" Ecriture et réecriture long métrage cinéma ")
                             ->addSession($session1)
                             ->addSession($session2)
                             ->addSession($session3);
        $manager->persist($fondsAideErlc);
        $manager->flush();
    }
}
