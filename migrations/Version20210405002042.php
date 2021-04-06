<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405002042 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO maldaba.statuses (id, code, title) VALUES (1, 'referred', 'Referred');
                           INSERT INTO maldaba.statuses (id, code, title) VALUES (2, 'accepted', 'Accepted');
                           INSERT INTO maldaba.statuses (id, code, title) VALUES (3, 'rejected', 'Rejected');");

        $this->addSql("INSERT INTO maldaba.clients (id, status_id, firstName, surname, email, date_of_birth, mobile_phone, postcode, address_1, address_2, city, country, title) VALUES (1, 1, 'Referred', 'Referred', 'referred@client.com', '2020-04-05 00:37:53', 'Referred', 'Referred', 'Referred', 'Referred', 'Referred', 'Referred', 'Referred');
                           INSERT INTO maldaba.clients (id, status_id, firstName, surname, email, date_of_birth, mobile_phone, postcode, address_1, address_2, city, country, title) VALUES (2, 2, 'Accepted', 'Accepted', 'accepted@client.com', '2020-04-05 00:37:53', 'Accepted', 'Accepted', 'Accepted', 'Accepted', 'Accepted', 'Accepted', 'Accepted');
                           INSERT INTO maldaba.clients (id, status_id, firstName, surname, email, date_of_birth, mobile_phone, postcode, address_1, address_2, city, country, title) VALUES (3, 3, 'Rejected', 'Rejected', 'rejected@client.com', '2020-04-05 00:37:53', 'Rejected', 'Rejected', 'Rejected', 'Rejected', 'Rejected', 'Rejected', 'Rejected');
                           INSERT INTO maldaba.clients (id, status_id, firstName, surname, email, date_of_birth, mobile_phone, postcode, address_1, address_2, city, country, title) VALUES (6, 1, 'Test', 'Test', 'Test@Test.Test', '2021-04-01 00:00:00', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test');");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP title');
    }
}
