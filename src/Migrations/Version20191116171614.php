<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191116171614 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stock ADD product_id_id INT NOT NULL, ADD size_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660AE945C60 FOREIGN KEY (size_id_id) REFERENCES size (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B365660DE18E50B ON stock (product_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B365660AE945C60 ON stock (size_id_id)');
        $this->addSql('ALTER TABLE product ADD category_id_id INT NOT NULL, ADD brand_id_id INT NOT NULL, ADD color_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD24BD5740 FOREIGN KEY (brand_id_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE88CCE5 FOREIGN KEY (color_id_id) REFERENCES color (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD9777D11E ON product (category_id_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD24BD5740 ON product (brand_id_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADE88CCE5 ON product (color_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9777D11E');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD24BD5740');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE88CCE5');
        $this->addSql('DROP INDEX IDX_D34A04AD9777D11E ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD24BD5740 ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADE88CCE5 ON product');
        $this->addSql('ALTER TABLE product DROP category_id_id, DROP brand_id_id, DROP color_id_id');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660DE18E50B');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660AE945C60');
        $this->addSql('DROP INDEX UNIQ_4B365660DE18E50B ON stock');
        $this->addSql('DROP INDEX UNIQ_4B365660AE945C60 ON stock');
        $this->addSql('ALTER TABLE stock DROP product_id_id, DROP size_id_id');
    }
}
