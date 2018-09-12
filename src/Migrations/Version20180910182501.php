<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910182501 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reglement ADD facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14CDBC5F284 FOREIGN KEY (facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EBE4C14CDBC5F284 ON reglement (facturation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reglement DROP FOREIGN KEY FK_EBE4C14CDBC5F284');
        $this->addSql('DROP INDEX UNIQ_EBE4C14CDBC5F284 ON reglement');
        $this->addSql('ALTER TABLE reglement DROP facturation_id');
    }
}
