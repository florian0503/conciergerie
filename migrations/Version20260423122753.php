<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260423122753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initial schema: article, avis, faq_item, logement, user';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(200) NOT NULL, tag VARCHAR(50) NOT NULL, title VARCHAR(255) NOT NULL, excerpt LONGTEXT NOT NULL, author VARCHAR(100) NOT NULL, date VARCHAR(50) NOT NULL, read_time VARCHAR(30) NOT NULL, img VARCHAR(500) NOT NULL, content LONGTEXT NOT NULL, publie TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_23A0E66989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, role VARCHAR(100) NOT NULL, texte LONGTEXT NOT NULL, note INT NOT NULL, proprietaire TINYINT(1) NOT NULL, publie TINYINT(1) NOT NULL, position INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq_item (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(50) NOT NULL, question VARCHAR(255) NOT NULL, reponse LONGTEXT NOT NULL, position INT NOT NULL, publie TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logement (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(100) NOT NULL, nom VARCHAR(150) NOT NULL, type VARCHAR(50) NOT NULL, quartier VARCHAR(100) NOT NULL, voyageurs INT NOT NULL, chambres INT NOT NULL, note DOUBLE PRECISION NOT NULL, avis INT NOT NULL, occupation INT NOT NULL, revenus VARCHAR(20) NOT NULL, img_index INT NOT NULL, photos LONGTEXT NOT NULL, description LONGTEXT NOT NULL, equipements LONGTEXT NOT NULL, points_interet LONGTEXT NOT NULL, publie TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_F0FD4457989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE faq_item');
        $this->addSql('DROP TABLE logement');
        $this->addSql('DROP TABLE `user`');
    }
}
