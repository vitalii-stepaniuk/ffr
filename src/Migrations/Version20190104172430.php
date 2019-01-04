<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190104172430 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        //$this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870C3023D60');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE ingredient_type');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, ingredient__type_id INT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_6BAF7870C3023D60 (ingredient__type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ingredient_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870C3023D60 FOREIGN KEY (ingredient__type_id) REFERENCES ingredient_type (id)');
    }
}
