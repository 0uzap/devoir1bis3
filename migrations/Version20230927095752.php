<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927095752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, id_usager_id INT DEFAULT NULL, id_modele_batterie_id INT DEFAULT NULL, date_contrat DATE NOT NULL, no_immatriculation VARCHAR(255) NOT NULL, INDEX IDX_60349993CF034CDB (id_usager_id), INDEX IDX_60349993F9A1A7D (id_modele_batterie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993CF034CDB FOREIGN KEY (id_usager_id) REFERENCES usager (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F9A1A7D FOREIGN KEY (id_modele_batterie_id) REFERENCES modele_batterie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993CF034CDB');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F9A1A7D');
        $this->addSql('DROP TABLE contrat');
    }
}
