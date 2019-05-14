<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190511153340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auteur_realisateur CHANGE nom nom VARCHAR(50) DEFAULT NULL, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL, CHANGE pseudonyme pseudonyme VARCHAR(150) DEFAULT NULL, CHANGE adresse adresse VARCHAR(60) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(6) DEFAULT NULL, CHANGE ville ville VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE document_audio_visuels CHANGE titre titre VARCHAR(255) DEFAULT NULL, CHANGE realisateur realisateur VARCHAR(255) DEFAULT NULL, CHANGE genre genre VARCHAR(255) DEFAULT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE producteur CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE nature nature VARCHAR(255) DEFAULT NULL, CHANGE siret siret VARCHAR(14) NOT NULL, CHANGE nom_gerant nom_gerant VARCHAR(50) DEFAULT NULL, CHANGE prenom_gerant prenom_gerant VARCHAR(100) DEFAULT NULL, CHANGE nom_producteur nom_producteur VARCHAR(50) DEFAULT NULL, CHANGE prenom_producteur prenom_producteur VARCHAR(100) DEFAULT NULL, CHANGE personne_chargee personne_chargee VARCHAR(150) DEFAULT NULL, CHANGE adresse adresse VARCHAR(60) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(6) DEFAULT NULL, CHANGE ville ville VARCHAR(50) DEFAULT NULL, CHANGE adresse_bureau adresse_bureau VARCHAR(60) DEFAULT NULL, CHANGE code_postale_bureau code_postale_bureau VARCHAR(6) DEFAULT NULL, CHANGE ville_bureau ville_bureau VARCHAR(6) DEFAULT NULL, CHANGE telephone_fixe telephone_fixe VARCHAR(25) DEFAULT NULL, CHANGE telephone_mobile telephone_mobile VARCHAR(17) DEFAULT NULL');
        $this->addSql('ALTER TABLE projet CHANGE genre genre VARCHAR(20) DEFAULT NULL, CHANGE adaptation_oeuvre adaptation_oeuvre TINYINT(1) DEFAULT NULL, CHANGE deposant deposant TINYINT(1) DEFAULT NULL, CHANGE type_aide_lm type_aide_lm VARCHAR(15) DEFAULT NULL, CHANGE total_charge_sociales_total_ht total_charge_sociales_total_ht DOUBLE PRECISION DEFAULT NULL, CHANGE financement_acquis financement_acquis TINYINT(1) DEFAULT NULL, CHANGE depot_projet_collectivite depot_projet_collectivite TINYINT(1) DEFAULT NULL, CHANGE type_aide_doc type_aide_doc VARCHAR(20) DEFAULT NULL, CHANGE type_film type_film VARCHAR(25) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auteur_realisateur CHANGE nom nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE pseudonyme pseudonyme VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE document_audio_visuels CHANGE titre titre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE realisateur realisateur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE genre genre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE mot_de_passe mot_de_passe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE producteur CHANGE nom nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE nature nature VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE siret siret VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE nom_gerant nom_gerant VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom_gerant prenom_gerant VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE nom_producteur nom_producteur VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom_producteur prenom_producteur VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE personne_chargee personne_chargee VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE ville ville VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE adresse_bureau adresse_bureau VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE code_postale_bureau code_postale_bureau VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE ville_bureau ville_bureau VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE telephone_fixe telephone_fixe VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE telephone_mobile telephone_mobile VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE projet CHANGE genre genre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE adaptation_oeuvre adaptation_oeuvre TINYINT(1) NOT NULL, CHANGE deposant deposant TINYINT(1) NOT NULL, CHANGE type_aide_lm type_aide_lm VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE type_aide_doc type_aide_doc VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE total_charge_sociales_total_ht total_charge_sociales_total_ht DOUBLE PRECISION NOT NULL, CHANGE financement_acquis financement_acquis TINYINT(1) NOT NULL, CHANGE depot_projet_collectivite depot_projet_collectivite TINYINT(1) NOT NULL, CHANGE type_film type_film VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
