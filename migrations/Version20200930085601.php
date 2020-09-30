<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200930085601 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, INDEX IDX_39986E43727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_item (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_item_album (media_item_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_191ABB0773B8D417 (media_item_id), INDEX IDX_191ABB071137ABCF (album_id), PRIMARY KEY(media_item_id, album_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, setting_type VARCHAR(255) NOT NULL, setting_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43727ACA70 FOREIGN KEY (parent_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE media_item_album ADD CONSTRAINT FK_191ABB0773B8D417 FOREIGN KEY (media_item_id) REFERENCES media_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_item_album ADD CONSTRAINT FK_191ABB071137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43727ACA70');
        $this->addSql('ALTER TABLE media_item_album DROP FOREIGN KEY FK_191ABB071137ABCF');
        $this->addSql('ALTER TABLE media_item_album DROP FOREIGN KEY FK_191ABB0773B8D417');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE media_item');
        $this->addSql('DROP TABLE media_item_album');
        $this->addSql('DROP TABLE setting');
        $this->addSql('DROP TABLE user');
    }
}
