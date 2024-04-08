<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240405062328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE filiari (id INT AUTO_INCREMENT NOT NULL, codice_filiare VARCHAR(45) NOT NULL, cap INT NOT NULL, citta VARCHAR(100) NOT NULL, prov VARCHAR(45) NOT NULL, indirizzo VARCHAR(150) NOT NULL, telefono VARCHAR(100) NOT NULL, email VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mezzi (id INT AUTO_INCREMENT NOT NULL, filiare_id INT NOT NULL, tipo_mezzo_id INT NOT NULL, codice_mezzo VARCHAR(45) DEFAULT NULL, targa VARCHAR(100) NOT NULL, marca VARCHAR(150) NOT NULL, modello VARCHAR(150) NOT NULL, data_imm DATE NOT NULL, data_rev DATE NOT NULL, classe_emiss SMALLINT NOT NULL, n_serbatoi SMALLINT NOT NULL, INDEX IDX_13A0E6D6839BE33F (filiare_id), INDEX IDX_13A0E6D6C2197E36 (tipo_mezzo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mezzi_rimorchi (mezzi_id INT NOT NULL, rimorchi_id INT NOT NULL, INDEX IDX_E6176BF931B77B23 (mezzi_id), INDEX IDX_E6176BF9C7278551 (rimorchi_id), PRIMARY KEY(mezzi_id, rimorchi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rimorchi (id INT AUTO_INCREMENT NOT NULL, filiare_id INT DEFAULT NULL, tipo_mezzo_id INT NOT NULL, codice_mezzo VARCHAR(45) DEFAULT NULL, marca VARCHAR(150) NOT NULL, modello VARCHAR(150) NOT NULL, data_imm DATE NOT NULL, data_rev DATE NOT NULL, n_assi SMALLINT NOT NULL, INDEX IDX_289C9997839BE33F (filiare_id), INDEX IDX_289C9997C2197E36 (tipo_mezzo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_mezzi (id INT AUTO_INCREMENT NOT NULL, descrizione VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mezzi ADD CONSTRAINT FK_13A0E6D6839BE33F FOREIGN KEY (filiare_id) REFERENCES filiari (id)');
        $this->addSql('ALTER TABLE mezzi ADD CONSTRAINT FK_13A0E6D6C2197E36 FOREIGN KEY (tipo_mezzo_id) REFERENCES tipo_mezzi (id)');
        $this->addSql('ALTER TABLE mezzi_rimorchi ADD CONSTRAINT FK_E6176BF931B77B23 FOREIGN KEY (mezzi_id) REFERENCES mezzi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mezzi_rimorchi ADD CONSTRAINT FK_E6176BF9C7278551 FOREIGN KEY (rimorchi_id) REFERENCES rimorchi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rimorchi ADD CONSTRAINT FK_289C9997839BE33F FOREIGN KEY (filiare_id) REFERENCES filiari (id)');
        $this->addSql('ALTER TABLE rimorchi ADD CONSTRAINT FK_289C9997C2197E36 FOREIGN KEY (tipo_mezzo_id) REFERENCES tipo_mezzi (id)');
        //$this->addSql('ALTER TABLE sedi CHANGE telefono telefono INT NOT NULL, CHANGE email email VARCHAR(45) NOT NULL');
        //$this->addSql('ALTER TABLE tipo_veicolo CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE tipo_desc tipo_desc VARCHAR(45) NOT NULL');
        //$this->addSql('ALTER TABLE veicoli ADD CONSTRAINT FK_49F1981DE19F41BF FOREIGN KEY (sede_id) REFERENCES sedi (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mezzi DROP FOREIGN KEY FK_13A0E6D6839BE33F');
        $this->addSql('ALTER TABLE mezzi DROP FOREIGN KEY FK_13A0E6D6C2197E36');
        $this->addSql('ALTER TABLE mezzi_rimorchi DROP FOREIGN KEY FK_E6176BF931B77B23');
        $this->addSql('ALTER TABLE mezzi_rimorchi DROP FOREIGN KEY FK_E6176BF9C7278551');
        $this->addSql('ALTER TABLE rimorchi DROP FOREIGN KEY FK_289C9997839BE33F');
        $this->addSql('ALTER TABLE rimorchi DROP FOREIGN KEY FK_289C9997C2197E36');
        $this->addSql('DROP TABLE filiari');
        $this->addSql('DROP TABLE mezzi');
        $this->addSql('DROP TABLE mezzi_rimorchi');
        $this->addSql('DROP TABLE rimorchi');
        $this->addSql('DROP TABLE tipo_mezzi');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE sedi CHANGE telefono telefono VARCHAR(45) DEFAULT NULL, CHANGE email email VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE tipo_veicolo CHANGE id id INT NOT NULL, CHANGE tipo_desc tipo_desc VARCHAR(45) DEFAULT NULL');
        $this->addSql('ALTER TABLE veicoli DROP FOREIGN KEY FK_49F1981DE19F41BF');
    }
}
