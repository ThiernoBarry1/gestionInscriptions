<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProducteurRepository")
 */
class Producteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $nature;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nomGerant;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prenomGerant;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nomProducteur;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prenomProducteur;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $personneChargee;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $adresseBureau;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $codePostaleBureau;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $villeBureau;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $telephoneFixe;

    /**
     * @ORM\Column(type="string", length=17, nullable=true)
     */
    private $telephoneMobile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $courriel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projet", inversedBy="producteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getNomGerant(): ?string
    {
        return $this->nomGerant;
    }

    public function setNomGerant(?string $nomGerant): self
    {
        $this->nomGerant = $nomGerant;

        return $this;
    }

    public function getPrenomGerant(): ?string
    {
        return $this->prenomGerant;
    }

    public function setPrenomGerant(?string $prenomGerant): self
    {
        $this->prenomGerant = $prenomGerant;

        return $this;
    }

    public function getNomProducteur(): ?string
    {
        return $this->nomProducteur;
    }

    public function setNomProducteur(?string $nomProducteur): self
    {
        $this->nomProducteur = $nomProducteur;

        return $this;
    }

    public function getPrenomProducteur(): ?string
    {
        return $this->prenomProducteur;
    }

    public function setPrenomProducteur(?string $prenomProducteur): self
    {
        $this->prenomProducteur = $prenomProducteur;

        return $this;
    }

    public function getPersonneChargee(): ?string
    {
        return $this->personneChargee;
    }

    public function setPersonneChargee(?string $personneChargee): self
    {
        $this->personneChargee = $personneChargee;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresseBureau(): ?string
    {
        return $this->adresseBureau;
    }

    public function setAdresseBureau(?string $adresseBureau): self
    {
        $this->adresseBureau = $adresseBureau;

        return $this;
    }

    public function getCodePostaleBureau(): ?string
    {
        return $this->codePostaleBureau;
    }

    public function setCodePostaleBureau(?string $codePostaleBureau): self
    {
        $this->codePostaleBureau = $codePostaleBureau;

        return $this;
    }

    public function getVilleBureau(): ?string
    {
        return $this->villeBureau;
    }

    public function setVilleBureau(?string $villeBureau): self
    {
        $this->villeBureau = $villeBureau;

        return $this;
    }

    public function getTelephoneFixe(): ?string
    {
        return $this->telephoneFixe;
    }

    public function setTelephoneFixe(?string $telephoneFixe): self
    {
        $this->telephoneFixe = $telephoneFixe;

        return $this;
    }

    public function getTelephoneMobile(): ?string
    {
        return $this->telephoneMobile;
    }

    public function setTelephoneMobile(?string $telephoneMobile): self
    {
        $this->telephoneMobile = $telephoneMobile;

        return $this;
    }

    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    public function setCourriel(string $courriel): self
    {
        $this->courriel = $courriel;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
   /*
    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
    */
}
