<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180503140213 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comanda_producto (comanda_id INT NOT NULL, producto_id INT NOT NULL, INDEX IDX_72FF6ACE787958A8 (comanda_id), INDEX IDX_72FF6ACE7645698E (producto_id), PRIMARY KEY(comanda_id, producto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comanda_producto ADD CONSTRAINT FK_72FF6ACE787958A8 FOREIGN KEY (comanda_id) REFERENCES comanda (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comanda_producto ADD CONSTRAINT FK_72FF6ACE7645698E FOREIGN KEY (producto_id) REFERENCES producto (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE producto_comanda');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE producto_comanda (producto_id INT NOT NULL, comanda_id INT NOT NULL, INDEX IDX_D40C456C7645698E (producto_id), INDEX IDX_D40C456C787958A8 (comanda_id), PRIMARY KEY(producto_id, comanda_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producto_comanda ADD CONSTRAINT FK_D40C456C7645698E FOREIGN KEY (producto_id) REFERENCES producto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producto_comanda ADD CONSTRAINT FK_D40C456C787958A8 FOREIGN KEY (comanda_id) REFERENCES comanda (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE comanda_producto');
    }
}
