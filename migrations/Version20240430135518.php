<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430135518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etape_preparation (id INT AUTO_INCREMENT NOT NULL, potion_id INT NOT NULL, ordre INT NOT NULL, description LONGTEXT NOT NULL, duree TIME NOT NULL, INDEX IDX_9B1D2FC77126B348 (potion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE potion_effect (id INT AUTO_INCREMENT NOT NULL, potion_id INT NOT NULL, effect_id INT NOT NULL, INDEX IDX_18CB92477126B348 (potion_id), INDEX IDX_18CB9247F5E9B83B (effect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE potion_ingredient (id INT AUTO_INCREMENT NOT NULL, potion_id INT NOT NULL, ingredient_id INT NOT NULL, unite_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_3FD8934C7126B348 (potion_id), INDEX IDX_3FD8934C933FE08C (ingredient_id), INDEX IDX_3FD8934CEC4A74AB (unite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etape_preparation ADD CONSTRAINT FK_9B1D2FC77126B348 FOREIGN KEY (potion_id) REFERENCES potion (id)');
        $this->addSql('ALTER TABLE potion_effect ADD CONSTRAINT FK_18CB92477126B348 FOREIGN KEY (potion_id) REFERENCES potion (id)');
        $this->addSql('ALTER TABLE potion_effect ADD CONSTRAINT FK_18CB9247F5E9B83B FOREIGN KEY (effect_id) REFERENCES effect (id)');
        $this->addSql('ALTER TABLE potion_ingredient ADD CONSTRAINT FK_3FD8934C7126B348 FOREIGN KEY (potion_id) REFERENCES potion (id)');
        $this->addSql('ALTER TABLE potion_ingredient ADD CONSTRAINT FK_3FD8934C933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE potion_ingredient ADD CONSTRAINT FK_3FD8934CEC4A74AB FOREIGN KEY (unite_id) REFERENCES unite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etape_preparation DROP FOREIGN KEY FK_9B1D2FC77126B348');
        $this->addSql('ALTER TABLE potion_effect DROP FOREIGN KEY FK_18CB92477126B348');
        $this->addSql('ALTER TABLE potion_effect DROP FOREIGN KEY FK_18CB9247F5E9B83B');
        $this->addSql('ALTER TABLE potion_ingredient DROP FOREIGN KEY FK_3FD8934C7126B348');
        $this->addSql('ALTER TABLE potion_ingredient DROP FOREIGN KEY FK_3FD8934C933FE08C');
        $this->addSql('ALTER TABLE potion_ingredient DROP FOREIGN KEY FK_3FD8934CEC4A74AB');
        $this->addSql('DROP TABLE etape_preparation');
        $this->addSql('DROP TABLE potion_effect');
        $this->addSql('DROP TABLE potion_ingredient');
    }
}
