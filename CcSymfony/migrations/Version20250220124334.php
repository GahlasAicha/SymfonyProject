<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220124334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__atelier AS SELECT id, nom, description, description_html, instructeur_id FROM atelier');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('CREATE TABLE atelier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, description_html CLOB DEFAULT NULL, instructeur_id INTEGER DEFAULT NULL, CONSTRAINT FK_E1BB182325FCA809 FOREIGN KEY (instructeur_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO atelier (id, nom, description, description_html, instructeur_id) SELECT id, nom, description, description_html, instructeur_id FROM __temp__atelier');
        $this->addSql('DROP TABLE __temp__atelier');
        $this->addSql('CREATE INDEX IDX_E1BB182325FCA809 ON atelier (instructeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__atelier AS SELECT id, nom, description, description_html, instructeur_id FROM atelier');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('CREATE TABLE atelier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, description_html CLOB DEFAULT NULL, instructeur_id INTEGER NOT NULL, CONSTRAINT FK_E1BB182325FCA809 FOREIGN KEY (instructeur_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO atelier (id, nom, description, description_html, instructeur_id) SELECT id, nom, description, description_html, instructeur_id FROM __temp__atelier');
        $this->addSql('DROP TABLE __temp__atelier');
        $this->addSql('CREATE INDEX IDX_E1BB182325FCA809 ON atelier (instructeur_id)');
    }
}
