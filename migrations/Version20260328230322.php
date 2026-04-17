<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260328230322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'vehicle table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicle (id UUID NOT NULL, vim VARCHAR(16) DEFAULT NULL, hsn VARCHAR(4) DEFAULT NULL, tsn VARCHAR(8) DEFAULT NULL, type VARCHAR(32) DEFAULT NULL, year INT DEFAULT NULL, engine VARCHAR(255) DEFAULT NULL, color VARCHAR(32) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, name VARCHAR(32) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, fuel_type VARCHAR(8) DEFAULT NULL, fuel_capacity DOUBLE PRECISION DEFAULT NULL, mileage INT DEFAULT NULL, vin VARCHAR(14) DEFAULT NULL, PRIMARY KEY (id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicle');
    }
}
