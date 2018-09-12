<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180909232444 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, date_ab DATETIME NOT NULL, numabonnement VARCHAR(12) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, prenomagent VARCHAR(45) NOT NULL, nomagent VARCHAR(35) NOT NULL, matricule VARCHAR(14) NOT NULL, adresse VARCHAR(60) NOT NULL, telephone VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chefvillage (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(45) NOT NULL, nom VARCHAR(35) NOT NULL, adresse VARCHAR(60) NOT NULL, telephone VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(45) NOT NULL, nom VARCHAR(30) NOT NULL, adresse VARCHAR(60) NOT NULL, telephone VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, etat TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consommation (id INT AUTO_INCREMENT NOT NULL, nouvelindex INT NOT NULL, ancienindex INT NOT NULL, datereleve DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facturation (id INT AUTO_INCREMENT NOT NULL, datefacturation DATETIME NOT NULL, datelimpaiement DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forage (id INT AUTO_INCREMENT NOT NULL, nomforage VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametre (id INT AUTO_INCREMENT NOT NULL, unitevolume VARCHAR(20) NOT NULL, prixunitevolume DOUBLE PRECISION NOT NULL, nbjours INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(45) NOT NULL, nom VARCHAR(35) NOT NULL, adresse VARCHAR(60) NOT NULL, telephone VARCHAR(15) NOT NULL, village VARCHAR(30) NOT NULL, commune VARCHAR(40) NOT NULL, forage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement (id INT AUTO_INCREMENT NOT NULL, datereg DATETIME NOT NULL, montant DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE chefvillage');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE consommation');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP TABLE forage');
        $this->addSql('DROP TABLE parametre');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE reglement');
    }
}
