<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240928094134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auftraggeber (id INT AUTO_INCREMENT NOT NULL, auftrags_arten_id INT NOT NULL, INDEX IDX_2A9C2CD94F9F3E40 (auftrags_arten_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE auftrags_arten (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE auftrags_position (id INT AUTO_INCREMENT NOT NULL, auftrag_id INT NOT NULL, INDEX IDX_88BF4F03B471FD09 (auftrag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE hochregallager (id INT AUTO_INCREMENT NOT NULL, spalte SMALLINT NOT NULL, oben TINYINT(1) NOT NULL, material_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_AAB7C6D7E308AC6F (material_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE materiallager (id INT AUTO_INCREMENT NOT NULL, saeule1_id INT DEFAULT NULL, saeule2_id INT DEFAULT NULL, saeule3_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_FB2EB24E6CC426A3 (saeule1_id), UNIQUE INDEX UNIQ_FB2EB24E7E71894D (saeule2_id), UNIQUE INDEX UNIQ_FB2EB24EC6CDEE28 (saeule3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE plaetze (id INT AUTO_INCREMENT NOT NULL, zu_abgaenge_id INT NOT NULL, UNIQUE INDEX UNIQ_1D685D9F35467628 (zu_abgaenge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE zu_abgaenge (id INT AUTO_INCREMENT NOT NULL, auftrags_position_id INT NOT NULL, material_id INT NOT NULL, station_id INT NOT NULL, INDEX IDX_229F6EBA48388636 (auftrags_position_id), INDEX IDX_229F6EBAE308AC6F (material_id), INDEX IDX_229F6EBA21BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE auftraggeber ADD CONSTRAINT FK_2A9C2CD94F9F3E40 FOREIGN KEY (auftrags_arten_id) REFERENCES auftrags_arten (id)');
        $this->addSql('ALTER TABLE auftrags_position ADD CONSTRAINT FK_88BF4F03B471FD09 FOREIGN KEY (auftrag_id) REFERENCES auftrag (id)');
        $this->addSql('ALTER TABLE hochregallager ADD CONSTRAINT FK_AAB7C6D7E308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE materiallager ADD CONSTRAINT FK_FB2EB24E6CC426A3 FOREIGN KEY (saeule1_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE materiallager ADD CONSTRAINT FK_FB2EB24E7E71894D FOREIGN KEY (saeule2_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE materiallager ADD CONSTRAINT FK_FB2EB24EC6CDEE28 FOREIGN KEY (saeule3_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE plaetze ADD CONSTRAINT FK_1D685D9F35467628 FOREIGN KEY (zu_abgaenge_id) REFERENCES zu_abgaenge (id)');
        $this->addSql('ALTER TABLE zu_abgaenge ADD CONSTRAINT FK_229F6EBA48388636 FOREIGN KEY (auftrags_position_id) REFERENCES auftrags_position (id)');
        $this->addSql('ALTER TABLE zu_abgaenge ADD CONSTRAINT FK_229F6EBAE308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE zu_abgaenge ADD CONSTRAINT FK_229F6EBA21BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE auftrag DROP datum, DROP status, CHANGE auftraggeber auftraggeber_id INT NOT NULL');
        $this->addSql('ALTER TABLE auftrag ADD CONSTRAINT FK_E128A35824917F64 FOREIGN KEY (auftraggeber_id) REFERENCES auftraggeber (id)');
        $this->addSql('CREATE INDEX IDX_E128A35824917F64 ON auftrag (auftraggeber_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auftraggeber DROP FOREIGN KEY FK_2A9C2CD94F9F3E40');
        $this->addSql('ALTER TABLE auftrags_position DROP FOREIGN KEY FK_88BF4F03B471FD09');
        $this->addSql('ALTER TABLE hochregallager DROP FOREIGN KEY FK_AAB7C6D7E308AC6F');
        $this->addSql('ALTER TABLE materiallager DROP FOREIGN KEY FK_FB2EB24E6CC426A3');
        $this->addSql('ALTER TABLE materiallager DROP FOREIGN KEY FK_FB2EB24E7E71894D');
        $this->addSql('ALTER TABLE materiallager DROP FOREIGN KEY FK_FB2EB24EC6CDEE28');
        $this->addSql('ALTER TABLE plaetze DROP FOREIGN KEY FK_1D685D9F35467628');
        $this->addSql('ALTER TABLE zu_abgaenge DROP FOREIGN KEY FK_229F6EBA48388636');
        $this->addSql('ALTER TABLE zu_abgaenge DROP FOREIGN KEY FK_229F6EBAE308AC6F');
        $this->addSql('ALTER TABLE zu_abgaenge DROP FOREIGN KEY FK_229F6EBA21BDB235');
        $this->addSql('DROP TABLE auftraggeber');
        $this->addSql('DROP TABLE auftrags_arten');
        $this->addSql('DROP TABLE auftrags_position');
        $this->addSql('DROP TABLE hochregallager');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE materiallager');
        $this->addSql('DROP TABLE plaetze');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE zu_abgaenge');
        $this->addSql('ALTER TABLE auftrag DROP FOREIGN KEY FK_E128A35824917F64');
        $this->addSql('DROP INDEX IDX_E128A35824917F64 ON auftrag');
        $this->addSql('ALTER TABLE auftrag ADD datum DATETIME NOT NULL, ADD status SMALLINT NOT NULL, CHANGE auftraggeber_id auftraggeber INT NOT NULL');
    }
}
