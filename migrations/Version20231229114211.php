<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231229114211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chercheur (id INT AUTO_INCREMENT NOT NULL, equipement_id INT NOT NULL, projet_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(50) NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_9DD29B50806F0F5C (equipement_id), INDEX IDX_9DD29B50C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, nom VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, disponibilite VARCHAR(255) NOT NULL, INDEX IDX_B8B4C6F3C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, date_debut VARCHAR(255) NOT NULL, date_fin VARCHAR(255) NOT NULL, etat_avancement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, titre VARCHAR(255) NOT NULL, auteur VARCHAR(50) NOT NULL, mots_cles VARCHAR(100) NOT NULL, INDEX IDX_AF3C6779C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chercheur ADD CONSTRAINT FK_9DD29B50806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE chercheur ADD CONSTRAINT FK_9DD29B50C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chercheur DROP FOREIGN KEY FK_9DD29B50806F0F5C');
        $this->addSql('ALTER TABLE chercheur DROP FOREIGN KEY FK_9DD29B50C18272');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3C18272');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779C18272');
        $this->addSql('DROP TABLE chercheur');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
