<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125131941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, name VARCHAR(255) NOT NULL, descritpion LONGTEXT NOT NULL, note VARCHAR(255) NOT NULL, INDEX IDX_23A0E666995AC4C (editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_devellopement_studio (article_id INT NOT NULL, devellopement_studio_id INT NOT NULL, INDEX IDX_70EA91437294869C (article_id), INDEX IDX_70EA91438020777D (devellopement_studio_id), PRIMARY KEY(article_id, devellopement_studio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_platform (article_id INT NOT NULL, platform_id INT NOT NULL, INDEX IDX_6CBA24A07294869C (article_id), INDEX IDX_6CBA24A0FFE6496F (platform_id), PRIMARY KEY(article_id, platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, article_id INT DEFAULT NULL, content LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), UNIQUE INDEX UNIQ_9474526C7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devellopement_studio (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, date_of_creation DATE NOT NULL, web_site_link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, release_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publisher (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, date_of_creation DATE NOT NULL, web_site_link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, role INT NOT NULL, mail_adress VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, birthday DATE NOT NULL, sex INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E666995AC4C FOREIGN KEY (editor_id) REFERENCES publisher (id)');
        $this->addSql('ALTER TABLE article_devellopement_studio ADD CONSTRAINT FK_70EA91437294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_devellopement_studio ADD CONSTRAINT FK_70EA91438020777D FOREIGN KEY (devellopement_studio_id) REFERENCES devellopement_studio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_platform ADD CONSTRAINT FK_6CBA24A07294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_platform ADD CONSTRAINT FK_6CBA24A0FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_devellopement_studio DROP FOREIGN KEY FK_70EA91437294869C');
        $this->addSql('ALTER TABLE article_platform DROP FOREIGN KEY FK_6CBA24A07294869C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7294869C');
        $this->addSql('ALTER TABLE article_devellopement_studio DROP FOREIGN KEY FK_70EA91438020777D');
        $this->addSql('ALTER TABLE article_platform DROP FOREIGN KEY FK_6CBA24A0FFE6496F');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E666995AC4C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_devellopement_studio');
        $this->addSql('DROP TABLE article_platform');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE devellopement_studio');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE publisher');
        $this->addSql('DROP TABLE user');
    }
}
