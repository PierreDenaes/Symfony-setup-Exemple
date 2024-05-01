<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430110857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, rarete_id INT NOT NULL, nom VARCHAR(255) NOT NULL, propriete LONGTEXT NOT NULL, INDEX IDX_6BAF7870C54C8C93 (type_id), INDEX IDX_6BAF78709E795D2F (rarete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rarete (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870C54C8C93 FOREIGN KEY (type_id) REFERENCES type_ingredient (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78709E795D2F FOREIGN KEY (rarete_id) REFERENCES rarete (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870C54C8C93');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78709E795D2F');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE rarete');
    }
}
