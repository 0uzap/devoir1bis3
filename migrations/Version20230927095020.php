<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927095020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE borne (id INT AUTO_INCREMENT NOT NULL, id_station_id INT NOT NULL, date_mise_en_service DATE NOT NULL, date_dernière_revision DATE NOT NULL, INDEX IDX_D7465BA5843732E2 (id_station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, latitude VARCHAR(30) NOT NULL, longitude VARCHAR(30) NOT NULL, adresse_rue VARCHAR(255) NOT NULL, adresse_ville VARCHAR(255) NOT NULL, code_postal VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE borne ADD CONSTRAINT FK_D7465BA5843732E2 FOREIGN KEY (id_station_id) REFERENCES station (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borne DROP FOREIGN KEY FK_D7465BA5843732E2');
        $this->addSql('DROP TABLE borne');
        $this->addSql('DROP TABLE station');
    }
}
