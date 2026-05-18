<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260518000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add avis_stats table, quartier slug, nullable article fields, membre_equipe photo_slug update';
    }

    public function up(Schema $schema): void
    {
        // Nouvelle table avis_stats
        $this->addSql('CREATE TABLE avis_stats (id INT AUTO_INCREMENT NOT NULL, note DOUBLE PRECISION NOT NULL, proprietaires_satisfaits INT NOT NULL, avis_total INT NOT NULL, recommandent INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Quartier : ajout du slug
        $this->addSql('ALTER TABLE quartier ADD slug VARCHAR(100) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_68E318FD989D9B62 ON quartier (slug)');

        // Article : read_time et img passent en nullable
        $this->addSql('ALTER TABLE article MODIFY read_time VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE article MODIFY img VARCHAR(500) DEFAULT NULL');

        // MembreEquipe : photo_slug passe en nullable et VARCHAR(255)
        $this->addSql('ALTER TABLE membre_equipe MODIFY photo_slug VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE avis_stats');
        $this->addSql('DROP INDEX UNIQ_68E318FD989D9B62 ON quartier');
        $this->addSql('ALTER TABLE quartier DROP slug');
        $this->addSql('ALTER TABLE article MODIFY read_time VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE article MODIFY img VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE membre_equipe MODIFY photo_slug VARCHAR(100) NOT NULL');
    }
}
