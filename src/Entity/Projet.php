<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formatTournage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formatDefinitif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $synopsis;

    /**
     * @ORM\Column(type="boolean")
     */
    private $adaptationOeuvre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deposant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Session", inversedBy="projets")
     */
    private $session;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Producteur", mappedBy="projet", cascade={"persist", "remove"})
     */
    private $producteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AuteurRealisateur", mappedBy="projet", orphanRemoval=true)
     */
    private $auteurRealisateurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DocumentAudioVisuels", mappedBy="projet")
     */
    private $documentAudioVisuels;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeAideLm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeDaideDoc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mtBudget;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $liensEligibilite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $datePreparation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateTournage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateDiffusion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $castionEnvisage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $listeLiensTournage;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreJoursTournage;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreJoursTotal;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $droitArtistiqueHt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $droitArtistiqueDRNHt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $personnel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $personnelDRNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $interpretationHt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $interpretationDNHT;

    /**
     * @ORM\Column(type="float")
     */
    private $totalChargeSocialesHt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalChargeSocialesDNHt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $decoEtCostumes;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $decoEtCostumesDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $transportHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $transportDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $moyenTechniqueTournage;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $postProd;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $moyenTechniqueTournageDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $postProdDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $assuranceEtFrais;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $assuranceEtFraisDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fraisFinanciersHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fraisFinanciersDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fraisGenerauxHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fraisGenerauxDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inprevus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inprevusDNHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalGeneralHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalGeneralDNHT;

    /**
     * @ORM\Column(type="boolean")
     */
    private $financementAcquis;

    /**
     * @ORM\Column(type="text")
     */
    private $financementAcquisPrecision;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $String;

    /**
     * @ORM\Column(type="boolean")
     */
    private $depotProjetCollectivite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $depotProjetCollectivitePrecision;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $projetDejaPresenterFA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projetDejaPresenteFADate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $projetDejaPresenteFATypeAide;

    public function __construct()
    {
        $this->auteurRealisateurs = new ArrayCollection();
        $this->documentAudioVisuels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getFormatTournage(): ?string
    {
        return $this->formatTournage;
    }

    public function setFormatTournage(string $formatTournage): self
    {
        $this->formatTournage = $formatTournage;

        return $this;
    }

    public function getFormatDefinitif(): ?string
    {
        return $this->formatDefinitif;
    }

    public function setFormatDefinitif(?string $formatDefinitif): self
    {
        $this->formatDefinitif = $formatDefinitif;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getAdaptationOeuvre(): ?bool
    {
        return $this->adaptationOeuvre;
    }

    public function setAdaptationOeuvre(bool $adaptationOeuvre): self
    {
        $this->adaptationOeuvre = $adaptationOeuvre;

        return $this;
    }

    public function getDeposant(): ?bool
    {
        return $this->deposant;
    }

    public function setDeposant(bool $deposant): self
    {
        $this->deposant = $deposant;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getProducteur(): ?Producteur
    {
        return $this->producteur;
    }

    public function setProducteur(Producteur $producteur): self
    {
        $this->producteur = $producteur;

        // set the owning side of the relation if necessary
        if ($this !== $producteur->getProjet()) {
            $producteur->setProjet($this);
        }

        return $this;
    }

    /**
     * @return Collection|AuteurRealisateur[]
     */
    public function getAuteurRealisateurs(): Collection
    {
        return $this->auteurRealisateurs;
    }

    public function addAuteurRealisateur(AuteurRealisateur $auteurRealisateur): self
    {
        if (!$this->auteurRealisateurs->contains($auteurRealisateur)) {
            $this->auteurRealisateurs[] = $auteurRealisateur;
            $auteurRealisateur->setProjet($this);
        }

        return $this;
    }

    public function removeAuteurRealisateur(AuteurRealisateur $auteurRealisateur): self
    {
        if ($this->auteurRealisateurs->contains($auteurRealisateur)) {
            $this->auteurRealisateurs->removeElement($auteurRealisateur);
            // set the owning side to null (unless already changed)
            if ($auteurRealisateur->getProjet() === $this) {
                $auteurRealisateur->setProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DocumentAudioVisuels[]
     */
    public function getDocumentAudioVisuels(): Collection
    {
        return $this->documentAudioVisuels;
    }

    public function addDocumentAudioVisuel(DocumentAudioVisuels $documentAudioVisuel): self
    {
        if (!$this->documentAudioVisuels->contains($documentAudioVisuel)) {
            $this->documentAudioVisuels[] = $documentAudioVisuel;
            $documentAudioVisuel->setProjet($this);
        }

        return $this;
    }

    public function removeDocumentAudioVisuel(DocumentAudioVisuels $documentAudioVisuel): self
    {
        if ($this->documentAudioVisuels->contains($documentAudioVisuel)) {
            $this->documentAudioVisuels->removeElement($documentAudioVisuel);
            // set the owning side to null (unless already changed)
            if ($documentAudioVisuel->getProjet() === $this) {
                $documentAudioVisuel->setProjet(null);
            }
        }

        return $this;
    }

    public function getTypeAideLm(): ?string
    {
        return $this->typeAideLm;
    }

    public function setTypeAideLm(?string $typeAideLm): self
    {
        $this->typeAideLm = $typeAideLm;

        return $this;
    }

    public function getTypeDaideDoc(): ?string
    {
        return $this->typeDaideDoc;
    }

    public function setTypeDaideDoc(?string $typeDaideDoc): self
    {
        $this->typeDaideDoc = $typeDaideDoc;

        return $this;
    }

    public function getMtBudget(): ?string
    {
        return $this->mtBudget;
    }

    public function setMtBudget(?string $mtBudget): self
    {
        $this->mtBudget = $mtBudget;

        return $this;
    }

    public function getLiensEligibilite(): ?string
    {
        return $this->liensEligibilite;
    }

    public function setLiensEligibilite(?string $liensEligibilite): self
    {
        $this->liensEligibilite = $liensEligibilite;

        return $this;
    }

    public function getDatePreparation(): ?string
    {
        return $this->datePreparation;
    }

    public function setDatePreparation(?string $datePreparation): self
    {
        $this->datePreparation = $datePreparation;

        return $this;
    }

    public function getDateTournage(): ?string
    {
        return $this->dateTournage;
    }

    public function setDateTournage(?string $dateTournage): self
    {
        $this->dateTournage = $dateTournage;

        return $this;
    }

    public function getDateDiffusion(): ?string
    {
        return $this->dateDiffusion;
    }

    public function setDateDiffusion(?string $dateDiffusion): self
    {
        $this->dateDiffusion = $dateDiffusion;

        return $this;
    }

    public function getCastionEnvisage(): ?string
    {
        return $this->castionEnvisage;
    }

    public function setCastionEnvisage(?string $castionEnvisage): self
    {
        $this->castionEnvisage = $castionEnvisage;

        return $this;
    }

    public function getListeLiensTournage(): ?string
    {
        return $this->listeLiensTournage;
    }

    public function setListeLiensTournage(?string $listeLiensTournage): self
    {
        $this->listeLiensTournage = $listeLiensTournage;

        return $this;
    }

    public function getNombreJoursTournage(): ?int
    {
        return $this->nombreJoursTournage;
    }

    public function setNombreJoursTournage(int $nombreJoursTournage): self
    {
        $this->nombreJoursTournage = $nombreJoursTournage;

        return $this;
    }

    public function getNombreJoursTotal(): ?int
    {
        return $this->nombreJoursTotal;
    }

    public function setNombreJoursTotal(int $nombreJoursTotal): self
    {
        $this->nombreJoursTotal = $nombreJoursTotal;

        return $this;
    }

    public function getDroitArtistiqueHt(): ?float
    {
        return $this->droitArtistiqueHt;
    }

    public function setDroitArtistiqueHt(?float $droitArtistiqueHt): self
    {
        $this->droitArtistiqueHt = $droitArtistiqueHt;

        return $this;
    }

    public function getDroitArtistiqueDRNHt(): ?int
    {
        return $this->droitArtistiqueDRNHt;
    }

    public function setDroitArtistiqueDRNHt(?int $droitArtistiqueDRNHt): self
    {
        $this->droitArtistiqueDRNHt = $droitArtistiqueDRNHt;

        return $this;
    }

    public function getPersonnel(): ?int
    {
        return $this->personnel;
    }

    public function setPersonnel(?int $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getPersonnelDRNHT(): ?int
    {
        return $this->personnelDRNHT;
    }

    public function setPersonnelDRNHT(?int $personnelDRNHT): self
    {
        $this->personnelDRNHT = $personnelDRNHT;

        return $this;
    }

    public function getInterpretationHt(): ?float
    {
        return $this->interpretationHt;
    }

    public function setInterpretationHt(?float $interpretationHt): self
    {
        $this->interpretationHt = $interpretationHt;

        return $this;
    }

    public function getInterpretationDNHT(): ?float
    {
        return $this->interpretationDNHT;
    }

    public function setInterpretationDNHT(?float $interpretationDNHT): self
    {
        $this->interpretationDNHT = $interpretationDNHT;

        return $this;
    }

    public function getTotalChargeSocialesHt(): ?float
    {
        return $this->totalChargeSocialesHt;
    }

    public function setTotalChargeSocialesHt(float $totalChargeSocialesHt): self
    {
        $this->totalChargeSocialesHt = $totalChargeSocialesHt;

        return $this;
    }

    public function getTotalChargeSocialesDNHt(): ?float
    {
        return $this->totalChargeSocialesDNHt;
    }

    public function setTotalChargeSocialesDNHt(?float $totalChargeSocialesDNHt): self
    {
        $this->totalChargeSocialesDNHt = $totalChargeSocialesDNHt;

        return $this;
    }

    public function getDecoEtCostumes(): ?float
    {
        return $this->decoEtCostumes;
    }

    public function setDecoEtCostumes(?float $decoEtCostumes): self
    {
        $this->decoEtCostumes = $decoEtCostumes;

        return $this;
    }

    public function getDecoEtCostumesDNHT(): ?float
    {
        return $this->decoEtCostumesDNHT;
    }

    public function setDecoEtCostumesDNHT(?float $decoEtCostumesDNHT): self
    {
        $this->decoEtCostumesDNHT = $decoEtCostumesDNHT;

        return $this;
    }

    public function getTransportHT(): ?float
    {
        return $this->transportHT;
    }

    public function setTransportHT(?float $transportHT): self
    {
        $this->transportHT = $transportHT;

        return $this;
    }

    public function getTransportDNHT(): ?float
    {
        return $this->transportDNHT;
    }

    public function setTransportDNHT(?float $transportDNHT): self
    {
        $this->transportDNHT = $transportDNHT;

        return $this;
    }

    public function getMoyenTechniqueTournage(): ?float
    {
        return $this->moyenTechniqueTournage;
    }

    public function setMoyenTechniqueTournage(?float $moyenTechniqueTournage): self
    {
        $this->moyenTechniqueTournage = $moyenTechniqueTournage;

        return $this;
    }

    public function getPostProd(): ?float
    {
        return $this->postProd;
    }

    public function setPostProd(?float $postProd): self
    {
        $this->postProd = $postProd;

        return $this;
    }

    public function getMoyenTechniqueTournageDNHT(): ?float
    {
        return $this->moyenTechniqueTournageDNHT;
    }

    public function setMoyenTechniqueTournageDNHT(?float $moyenTechniqueTournageDNHT): self
    {
        $this->moyenTechniqueTournageDNHT = $moyenTechniqueTournageDNHT;

        return $this;
    }

    public function getPostProdDNHT(): ?float
    {
        return $this->postProdDNHT;
    }

    public function setPostProdDNHT(?float $postProdDNHT): self
    {
        $this->postProdDNHT = $postProdDNHT;

        return $this;
    }

    public function getAssuranceEtFrais(): ?float
    {
        return $this->assuranceEtFrais;
    }

    public function setAssuranceEtFrais(?float $assuranceEtFrais): self
    {
        $this->assuranceEtFrais = $assuranceEtFrais;

        return $this;
    }

    public function getAssuranceEtFraisDNHT(): ?float
    {
        return $this->assuranceEtFraisDNHT;
    }

    public function setAssuranceEtFraisDNHT(?float $assuranceEtFraisDNHT): self
    {
        $this->assuranceEtFraisDNHT = $assuranceEtFraisDNHT;

        return $this;
    }

    public function getFraisFinanciersHT(): ?float
    {
        return $this->fraisFinanciersHT;
    }

    public function setFraisFinanciersHT(?float $fraisFinanciersHT): self
    {
        $this->fraisFinanciersHT = $fraisFinanciersHT;

        return $this;
    }

    public function getFraisFinanciersDNHT(): ?float
    {
        return $this->fraisFinanciersDNHT;
    }

    public function setFraisFinanciersDNHT(?float $fraisFinanciersDNHT): self
    {
        $this->fraisFinanciersDNHT = $fraisFinanciersDNHT;

        return $this;
    }

    public function getFraisGenerauxHT(): ?float
    {
        return $this->fraisGenerauxHT;
    }

    public function setFraisGenerauxHT(?float $fraisGenerauxHT): self
    {
        $this->fraisGenerauxHT = $fraisGenerauxHT;

        return $this;
    }

    public function getFraisGenerauxDNHT(): ?float
    {
        return $this->fraisGenerauxDNHT;
    }

    public function setFraisGenerauxDNHT(?float $fraisGenerauxDNHT): self
    {
        $this->fraisGenerauxDNHT = $fraisGenerauxDNHT;

        return $this;
    }

    public function getInprevus(): ?float
    {
        return $this->inprevus;
    }

    public function setInprevus(?float $inprevus): self
    {
        $this->inprevus = $inprevus;

        return $this;
    }

    public function getInprevusDNHT(): ?float
    {
        return $this->inprevusDNHT;
    }

    public function setInprevusDNHT(?float $inprevusDNHT): self
    {
        $this->inprevusDNHT = $inprevusDNHT;

        return $this;
    }

    public function getTotalGeneralHT(): ?float
    {
        return $this->totalGeneralHT;
    }

    public function setTotalGeneralHT(?float $totalGeneralHT): self
    {
        $this->totalGeneralHT = $totalGeneralHT;

        return $this;
    }

    public function getTotalGeneralDNHT(): ?float
    {
        return $this->totalGeneralDNHT;
    }

    public function setTotalGeneralDNHT(?float $totalGeneralDNHT): self
    {
        $this->totalGeneralDNHT = $totalGeneralDNHT;

        return $this;
    }

    public function getFinancementAcquis(): ?bool
    {
        return $this->financementAcquis;
    }

    public function setFinancementAcquis(bool $financementAcquis): self
    {
        $this->financementAcquis = $financementAcquis;

        return $this;
    }

    public function getFinancementAcquisPrecision(): ?string
    {
        return $this->financementAcquisPrecision;
    }

    public function setFinancementAcquisPrecision(string $financementAcquisPrecision): self
    {
        $this->financementAcquisPrecision = $financementAcquisPrecision;

        return $this;
    }

    public function getString(): ?string
    {
        return $this->String;
    }

    public function setString(?string $String): self
    {
        $this->String = $String;

        return $this;
    }

    public function getDepotProjetCollectivite(): ?bool
    {
        return $this->depotProjetCollectivite;
    }

    public function setDepotProjetCollectivite(bool $depotProjetCollectivite): self
    {
        $this->depotProjetCollectivite = $depotProjetCollectivite;

        return $this;
    }

    public function getDepotProjetCollectivitePrecision(): ?string
    {
        return $this->depotProjetCollectivitePrecision;
    }

    public function setDepotProjetCollectivitePrecision(?string $depotProjetCollectivitePrecision): self
    {
        $this->depotProjetCollectivitePrecision = $depotProjetCollectivitePrecision;

        return $this;
    }

    public function getProjetDejaPresenterFA(): ?bool
    {
        return $this->projetDejaPresenterFA;
    }

    public function setProjetDejaPresenterFA(?bool $projetDejaPresenterFA): self
    {
        $this->projetDejaPresenterFA = $projetDejaPresenterFA;

        return $this;
    }

    public function getProjetDejaPresenteFADate(): ?string
    {
        return $this->projetDejaPresenteFADate;
    }

    public function setProjetDejaPresenteFADate(?string $projetDejaPresenteFADate): self
    {
        $this->projetDejaPresenteFADate = $projetDejaPresenteFADate;

        return $this;
    }

    public function getProjetDejaPresenteFATypeAide(): ?string
    {
        return $this->projetDejaPresenteFATypeAide;
    }

    public function setProjetDejaPresenteFATypeAide(?string $projetDejaPresenteFATypeAide): self
    {
        $this->projetDejaPresenteFATypeAide = $projetDejaPresenteFATypeAide;

        return $this;
    }
}
