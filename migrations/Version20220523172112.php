<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523172112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, tel VARCHAR(15) NOT NULL, pseudo VARCHAR(15) NOT NULL, mdp VARCHAR(30) NOT NULL, profil VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moderateurs (id INT AUTO_INCREMENT NOT NULL, news_id INT DEFAULT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, tel VARCHAR(15) NOT NULL, pseudo VARCHAR(15) NOT NULL, mdp VARCHAR(30) NOT NULL, profil VARCHAR(15) NOT NULL, INDEX IDX_776586D3B5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newletters (id INT AUTO_INCREMENT NOT NULL, publiants_id INT DEFAULT NULL, ufr VARCHAR(30) NOT NULL, departement VARCHAR(30) NOT NULL, niveau VARCHAR(15) NOT NULL, status VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_FAFCFB5283ECD863 (publiants_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, formation_destinataire VARCHAR(50) NOT NULL, date_redactionn DATE NOT NULL, date_moderation DATE DEFAULT NULL, titre_avant_moderation VARCHAR(30) NOT NULL, texte_avant_moderation LONGTEXT NOT NULL, titre_apres_moderation VARCHAR(30) DEFAULT NULL, texte_apres_moderation LONGTEXT DEFAULT NULL, accord_moderation VARCHAR(30) DEFAULT NULL, date_souhaite_debut_publication DATE NOT NULL, date_effective_debut_publication DATE DEFAULT NULL, date_souhaite_fin_publication DATE NOT NULL, date_effective_fin_publication DATE DEFAULT NULL, motivation_invalidation LONGTEXT DEFAULT NULL, importance_news LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publiants (id INT AUTO_INCREMENT NOT NULL, news_id INT DEFAULT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, tel VARCHAR(15) NOT NULL, mdp VARCHAR(30) NOT NULL, profil VARCHAR(15) NOT NULL, INDEX IDX_46AB2566B5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE moderateurs ADD CONSTRAINT FK_776586D3B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE newletters ADD CONSTRAINT FK_FAFCFB5283ECD863 FOREIGN KEY (publiants_id) REFERENCES publiants (id)');
        $this->addSql('ALTER TABLE publiants ADD CONSTRAINT FK_46AB2566B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moderateurs DROP FOREIGN KEY FK_776586D3B5A459A0');
        $this->addSql('ALTER TABLE publiants DROP FOREIGN KEY FK_46AB2566B5A459A0');
        $this->addSql('ALTER TABLE newletters DROP FOREIGN KEY FK_FAFCFB5283ECD863');
        $this->addSql('DROP TABLE administrateurs');
        $this->addSql('DROP TABLE moderateurs');
        $this->addSql('DROP TABLE newletters');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE publiants');
    }
}
