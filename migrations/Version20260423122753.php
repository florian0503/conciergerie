<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260423122753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, slug VARCHAR(200) NOT NULL, tag VARCHAR(50) NOT NULL, title VARCHAR(255) NOT NULL, excerpt CLOB NOT NULL, author VARCHAR(100) NOT NULL, date VARCHAR(50) NOT NULL, read_time VARCHAR(30) NOT NULL, img VARCHAR(500) NOT NULL, content CLOB NOT NULL, publie BOOLEAN NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_23A0E66989D9B62 ON article (slug)');
        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, role VARCHAR(100) NOT NULL, texte CLOB NOT NULL, note INTEGER NOT NULL, proprietaire BOOLEAN NOT NULL, publie BOOLEAN NOT NULL, position INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE faq_item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie VARCHAR(50) NOT NULL, question VARCHAR(255) NOT NULL, reponse CLOB NOT NULL, position INTEGER NOT NULL, publie BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE logement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, slug VARCHAR(100) NOT NULL, nom VARCHAR(150) NOT NULL, type VARCHAR(50) NOT NULL, quartier VARCHAR(100) NOT NULL, voyageurs INTEGER NOT NULL, chambres INTEGER NOT NULL, note DOUBLE PRECISION NOT NULL, avis INTEGER NOT NULL, occupation INTEGER NOT NULL, revenus VARCHAR(20) NOT NULL, img_index INTEGER NOT NULL, photos CLOB NOT NULL, description CLOB NOT NULL, equipements CLOB NOT NULL, points_interet CLOB NOT NULL, publie BOOLEAN NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F0FD4457989D9B62 ON logement (slug)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL, password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE faq_item');
        $this->addSql('DROP TABLE logement');
        $this->addSql('DROP TABLE "user"');
    }
}
