<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260424084516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create membre_equipe table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE membre_equipe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, role VARCHAR(100) NOT NULL, bio LONGTEXT NOT NULL, tags LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', photo_slug VARCHAR(100) NOT NULL, position INT NOT NULL, publie TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE membre_equipe');
    }
}
