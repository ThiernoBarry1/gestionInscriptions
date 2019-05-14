<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190510100549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auteur_realisateur CHANGE type_personne type_personne VARCHAR(25) NOT NULL');
        $this->addSql('ALTER TABLE projet ADD type_film VARCHAR(25) NOT NULL, CHANGE adaptation_oeuvre_dfc adaptation_oeuvre_dfc VARCHAR(5) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auteur_realisateur CHANGE type_personne type_personne VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE projet DROP type_film, CHANGE adaptation_oeuvre_dfc adaptation_oeuvre_dfc DATETIME DEFAULT NULL');
    }
}
