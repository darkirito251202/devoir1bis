<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005085017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD secteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404559F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur_activite (id)');
        $this->addSql('CREATE INDEX IDX_C74404559F7E4405 ON client (secteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404559F7E4405');
        $this->addSql('DROP INDEX IDX_C74404559F7E4405 ON client');
        $this->addSql('ALTER TABLE client DROP secteur_id');
    }
}
