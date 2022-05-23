<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523181131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moderateurs DROP FOREIGN KEY FK_776586D3B5A459A0');
        $this->addSql('DROP INDEX IDX_776586D3B5A459A0 ON moderateurs');
        $this->addSql('ALTER TABLE moderateurs DROP news_id');
        $this->addSql('ALTER TABLE news ADD publiants_id INT DEFAULT NULL, ADD moderateurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD3995083ECD863 FOREIGN KEY (publiants_id) REFERENCES publiants (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950B98FE434 FOREIGN KEY (moderateurs_id) REFERENCES moderateurs (id)');
        $this->addSql('CREATE INDEX IDX_1DD3995083ECD863 ON news (publiants_id)');
        $this->addSql('CREATE INDEX IDX_1DD39950B98FE434 ON news (moderateurs_id)');
        $this->addSql('ALTER TABLE publiants DROP FOREIGN KEY FK_46AB2566B5A459A0');
        $this->addSql('DROP INDEX IDX_46AB2566B5A459A0 ON publiants');
        $this->addSql('ALTER TABLE publiants DROP news_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moderateurs ADD news_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE moderateurs ADD CONSTRAINT FK_776586D3B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('CREATE INDEX IDX_776586D3B5A459A0 ON moderateurs (news_id)');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD3995083ECD863');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950B98FE434');
        $this->addSql('DROP INDEX IDX_1DD3995083ECD863 ON news');
        $this->addSql('DROP INDEX IDX_1DD39950B98FE434 ON news');
        $this->addSql('ALTER TABLE news DROP publiants_id, DROP moderateurs_id');
        $this->addSql('ALTER TABLE publiants ADD news_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publiants ADD CONSTRAINT FK_46AB2566B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('CREATE INDEX IDX_46AB2566B5A459A0 ON publiants (news_id)');
    }
}
