<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190104153257 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE recipe_stream_condition (recipe_id INT NOT NULL, stream_condition_id INT NOT NULL, INDEX IDX_F1F20E8259D8A214 (recipe_id), INDEX IDX_F1F20E822D7A757F (stream_condition_id), PRIMARY KEY(recipe_id, stream_condition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe_stream_condition ADD CONSTRAINT FK_F1F20E8259D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_stream_condition ADD CONSTRAINT FK_F1F20E822D7A757F FOREIGN KEY (stream_condition_id) REFERENCES stream_condition (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE recipe_stream_condition');
    }
}
