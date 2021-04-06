<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210404224813 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, firstName VARCHAR(50) NOT NULL, surname VARCHAR(50) NOT NULL, email VARCHAR(60) NOT NULL, date_of_birth DATETIME NOT NULL, mobile_phone VARCHAR(20) NOT NULL, postcode VARCHAR(20) NOT NULL, address_1 VARCHAR(50) NOT NULL, address_2 VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, INDEX IDX_C82E746BF700BD (status_id), UNIQUE INDEX client_email_uindex (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuses (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(50) NOT NULL, title VARCHAR(50) NOT NULL, UNIQUE INDEX status_code (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E746BF700BD FOREIGN KEY (status_id) REFERENCES statuses (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E746BF700BD');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE statuses');
    }
}
