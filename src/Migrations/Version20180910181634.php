<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910181634 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE agent_compteur (agent_id INT NOT NULL, compteur_id INT NOT NULL, INDEX IDX_7BD302413414710B (agent_id), INDEX IDX_7BD30241AA3B9810 (compteur_id), PRIMARY KEY(agent_id, compteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_compteur ADD CONSTRAINT FK_7BD302413414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_compteur ADD CONSTRAINT FK_7BD30241AA3B9810 FOREIGN KEY (compteur_id) REFERENCES compteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chefvillage ADD village_id INT NOT NULL');
        $this->addSql('ALTER TABLE chefvillage ADD CONSTRAINT FK_B3F1C8525E0D5582 FOREIGN KEY (village_id) REFERENCES village (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3F1C8525E0D5582 ON chefvillage (village_id)');
        $this->addSql('ALTER TABLE compteur ADD abonnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compteur ADD CONSTRAINT FK_4D021BD5F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D021BD5F1D74413 ON compteur (abonnement_id)');
        $this->addSql('ALTER TABLE facturation ADD consommation_id INT NOT NULL');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513AC1076F84 FOREIGN KEY (consommation_id) REFERENCES consommation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17EB513AC1076F84 ON facturation (consommation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE agent_compteur');
        $this->addSql('ALTER TABLE chefvillage DROP FOREIGN KEY FK_B3F1C8525E0D5582');
        $this->addSql('DROP INDEX UNIQ_B3F1C8525E0D5582 ON chefvillage');
        $this->addSql('ALTER TABLE chefvillage DROP village_id');
        $this->addSql('ALTER TABLE compteur DROP FOREIGN KEY FK_4D021BD5F1D74413');
        $this->addSql('DROP INDEX UNIQ_4D021BD5F1D74413 ON compteur');
        $this->addSql('ALTER TABLE compteur DROP abonnement_id');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513AC1076F84');
        $this->addSql('DROP INDEX UNIQ_17EB513AC1076F84 ON facturation');
        $this->addSql('ALTER TABLE facturation DROP consommation_id');
    }
}
