<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190104172100 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870C47B8755');
        $this->addSql('DROP INDEX IDX_6BAF7870C47B8755 ON ingredient');
        $this->addSql('ALTER TABLE ingredient CHANGE ingredient_type_id ingredient__type_id INT NOT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870C3023D60 FOREIGN KEY (ingredient__type_id) REFERENCES ingredient_type (id)');
        $this->addSql('CREATE INDEX IDX_6BAF7870C3023D60 ON ingredient (ingredient__type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870C3023D60');
        $this->addSql('DROP INDEX IDX_6BAF7870C3023D60 ON ingredient');
        $this->addSql('ALTER TABLE ingredient CHANGE ingredient__type_id ingredient_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870C47B8755 FOREIGN KEY (ingredient_type_id) REFERENCES ingredient_type (id)');
        $this->addSql('CREATE INDEX IDX_6BAF7870C47B8755 ON ingredient (ingredient_type_id)');
    }
}
