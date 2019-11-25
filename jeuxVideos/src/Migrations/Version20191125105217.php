<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125105217 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article_devellopement_studio (article_id INT NOT NULL, devellopement_studio_id INT NOT NULL, INDEX IDX_70EA91437294869C (article_id), INDEX IDX_70EA91438020777D (devellopement_studio_id), PRIMARY KEY(article_id, devellopement_studio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_platform (article_id INT NOT NULL, platform_id INT NOT NULL, INDEX IDX_6CBA24A07294869C (article_id), INDEX IDX_6CBA24A0FFE6496F (platform_id), PRIMARY KEY(article_id, platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_devellopement_studio ADD CONSTRAINT FK_70EA91437294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_devellopement_studio ADD CONSTRAINT FK_70EA91438020777D FOREIGN KEY (devellopement_studio_id) REFERENCES devellopement_studio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_platform ADD CONSTRAINT FK_6CBA24A07294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_platform ADD CONSTRAINT FK_6CBA24A0FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD editor_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD descritpion LONGTEXT NOT NULL, ADD note VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E666995AC4C FOREIGN KEY (editor_id) REFERENCES publisher (id)');
        $this->addSql('CREATE INDEX IDX_23A0E666995AC4C ON article (editor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article_devellopement_studio');
        $this->addSql('DROP TABLE article_platform');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E666995AC4C');
        $this->addSql('DROP INDEX IDX_23A0E666995AC4C ON article');
        $this->addSql('ALTER TABLE article DROP editor_id, DROP name, DROP descritpion, DROP note');
    }
}
