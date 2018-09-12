<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910002916 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE forage ADD village_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE forage ADD CONSTRAINT FK_EB4A0CCF5E0D5582 FOREIGN KEY (village_id) REFERENCES village (id)');
        $this->addSql('CREATE INDEX IDX_EB4A0CCF5E0D5582 ON forage (village_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE forage DROP FOREIGN KEY FK_EB4A0CCF5E0D5582');
        $this->addSql('DROP INDEX IDX_EB4A0CCF5E0D5582 ON forage');
        $this->addSql('ALTER TABLE forage DROP village_id');
    }
}
