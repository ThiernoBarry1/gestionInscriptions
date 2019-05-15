<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190514143820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producteur ADD prenom_personne_chargee VARCHAR(255) DEFAULT NULL, ADD nom_personne_chargee VARCHAR(255) DEFAULT NULL, ADD telephone_mobile_personne_chargee VARCHAR(255) DEFAULT NULL, ADD telephone_fixe_personne_chargee VARCHAR(255) DEFAULT NULL, ADD courriel_personne_chargee VARCHAR(255) DEFAULT NULL, ADD telephone_mobile_production VARCHAR(255) DEFAULT NULL, ADD telephone_fixe_production VARCHAR(255) DEFAULT NULL, ADD courriel_producteur VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD type_oeuvre VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producteur DROP prenom_personne_chargee, DROP nom_personne_chargee, DROP telephone_mobile_personne_chargee, DROP telephone_fixe_personne_chargee, DROP courriel_personne_chargee, DROP telephone_mobile_production, DROP telephone_fixe_production, DROP courriel_producteur');
        $this->addSql('ALTER TABLE projet DROP type_oeuvre');
    }
}
