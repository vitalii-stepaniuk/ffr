<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190116212632 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipe_item ADD unit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recipe_item ADD CONSTRAINT FK_60007FC1F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('CREATE INDEX IDX_60007FC1F8BD700D ON recipe_item (unit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recipe_item DROP FOREIGN KEY FK_60007FC1F8BD700D');
        $this->addSql('DROP INDEX IDX_60007FC1F8BD700D ON recipe_item');
        $this->addSql('ALTER TABLE recipe_item DROP unit_id');
    }
}
