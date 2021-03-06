<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910182935 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consommation ADD agent_id INT NOT NULL');
        $this->addSql('ALTER TABLE consommation ADD CONSTRAINT FK_F993F0A23414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('CREATE INDEX IDX_F993F0A23414710B ON consommation (agent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consommation DROP FOREIGN KEY FK_F993F0A23414710B');
        $this->addSql('DROP INDEX IDX_F993F0A23414710B ON consommation');
        $this->addSql('ALTER TABLE consommation DROP agent_id');
    }
}
