<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190104161644 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE recipe_water_temperature_condition (recipe_id INT NOT NULL, water_temperature_condition_id INT NOT NULL, INDEX IDX_E22FE3D059D8A214 (recipe_id), INDEX IDX_E22FE3D05E9F64E8 (water_temperature_condition_id), PRIMARY KEY(recipe_id, water_temperature_condition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipe_water_temperature_condition ADD CONSTRAINT FK_E22FE3D059D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_water_temperature_condition ADD CONSTRAINT FK_E22FE3D05E9F64E8 FOREIGN KEY (water_temperature_condition_id) REFERENCES water_temperature_condition (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE recipe_water_temperature_condition');
    }
}
