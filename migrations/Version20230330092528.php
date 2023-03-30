<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330092528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE i23_basket (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_user INTEGER NOT NULL, id_good INTEGER NOT NULL, quantity INTEGER NOT NULL, CONSTRAINT FK_83E493806B3CA4B FOREIGN KEY (id_user) REFERENCES i23_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_83E49380E7A45290 FOREIGN KEY (id_good) REFERENCES i23_goods (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_83E493806B3CA4B ON i23_basket (id_user)');
        $this->addSql('CREATE INDEX IDX_83E49380E7A45290 ON i23_basket (id_good)');
        $this->addSql('CREATE TABLE i23_goods (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, label VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, stock INTEGER NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE i23_basket');
        $this->addSql('DROP TABLE i23_goods');
    }
}
