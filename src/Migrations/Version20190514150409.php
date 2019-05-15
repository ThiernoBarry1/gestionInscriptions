<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190514150409 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producteur ADD telephone_mobile_producteur VARCHAR(255) DEFAULT NULL, ADD telephone_fixe_producteur VARCHAR(255) DEFAULT NULL, DROP personne_chargee, DROP telephone_fixe, DROP telephone_mobile, DROP courriel, DROP telephone_mobile_production, DROP telephone_fixe_production');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producteur ADD personne_chargee VARCHAR(150) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD telephone_fixe VARCHAR(25) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD telephone_mobile VARCHAR(17) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD courriel VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD telephone_mobile_production VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD telephone_fixe_production VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP telephone_mobile_producteur, DROP telephone_fixe_producteur');
    }
}
