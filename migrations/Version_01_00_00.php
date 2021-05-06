<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version_01_00_00 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(' CREATE TABLE media (
            id INT AUTO_INCREMENT NOT NULL, 
            title VARCHAR(255) NOT NULL, explanation LONGTEXT NOT NULL, 
            date DATE NOT NULL, 
            image VARCHAR(255) NOT NULL, 
            url VARCHAR(255) NOT NULL, 
            media_type VARCHAR(255) NOT NULL, 
            INDEX media_type_idx (media_type), 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS apod;');

    }
}
