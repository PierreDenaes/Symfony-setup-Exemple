<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430091131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE potion (id INT AUTO_INCREMENT NOT NULL, min_magical_level_id INT NOT NULL, id_profil_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_4AB6B0AD68B1D244 (min_magical_level_id), INDEX IDX_4AB6B0ADA76B6C5F (id_profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE potion ADD CONSTRAINT FK_4AB6B0AD68B1D244 FOREIGN KEY (min_magical_level_id) REFERENCES magical_level (id)');
        $this->addSql('ALTER TABLE potion ADD CONSTRAINT FK_4AB6B0ADA76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profile (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE potion DROP FOREIGN KEY FK_4AB6B0AD68B1D244');
        $this->addSql('ALTER TABLE potion DROP FOREIGN KEY FK_4AB6B0ADA76B6C5F');
        $this->addSql('DROP TABLE potion');
    }
}
