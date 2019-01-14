<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190114194623 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipe_item ADD ingredient_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_item ADD CONSTRAINT FK_60007FC1933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60007FC1933FE08C ON recipe_item (ingredient_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipe_item DROP FOREIGN KEY FK_60007FC1933FE08C');
        $this->addSql('DROP INDEX UNIQ_60007FC1933FE08C ON recipe_item');
        $this->addSql('ALTER TABLE recipe_item DROP ingredient_id');
    }
}
