<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191101173027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE picture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE picture (id INT NOT NULL, folderid INT DEFAULT NULL, picname VARCHAR(255) NOT NULL, origwidth INT NOT NULL, origheight INT NOT NULL, volume INT NOT NULL, size1 VARCHAR(64) NOT NULL, size2 VARCHAR(64) NOT NULL, size3 VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_16DB4F89B8B19A55 ON picture (folderid)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89B8B19A55 FOREIGN KEY (folderid) REFERENCES folder (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE picture_id_seq CASCADE');
        $this->addSql('DROP TABLE picture');
    }
}
