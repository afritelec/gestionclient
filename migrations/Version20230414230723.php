<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414230723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, siren VARCHAR(60) NOT NULL, interlocutaire VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, adress LONGTEXT NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossiers (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, create_date DATE NOT NULL, mod_date DATE DEFAULT NULL, site_client LONGTEXT NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_A38E22E419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossiers_services (dossiers_id INT NOT NULL, services_id INT NOT NULL, INDEX IDX_C6DAE32A651855E8 (dossiers_id), INDEX IDX_C6DAE32AAEF5A6C1 (services_id), PRIMARY KEY(dossiers_id, services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, mt_cmd DOUBLE PRECISION NOT NULL, montant_m DOUBLE PRECISION NOT NULL, INDEX IDX_7332E16912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dossiers ADD CONSTRAINT FK_A38E22E419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE dossiers_services ADD CONSTRAINT FK_C6DAE32A651855E8 FOREIGN KEY (dossiers_id) REFERENCES dossiers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dossiers_services ADD CONSTRAINT FK_C6DAE32AAEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E16912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossiers DROP FOREIGN KEY FK_A38E22E419EB6921');
        $this->addSql('ALTER TABLE dossiers_services DROP FOREIGN KEY FK_C6DAE32A651855E8');
        $this->addSql('ALTER TABLE dossiers_services DROP FOREIGN KEY FK_C6DAE32AAEF5A6C1');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E16912469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE dossiers');
        $this->addSql('DROP TABLE dossiers_services');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
