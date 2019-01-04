<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190104151436 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE migrations');
        $this->addSql('DROP TABLE password_resets');
        $this->addSql('DROP TABLE recipes');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE migrations (id INT UNSIGNED AUTO_INCREMENT NOT NULL, migration VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, batch INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE password_resets (email VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, token VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME DEFAULT NULL, INDEX password_resets_email_index (email)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE recipes (r_id INT UNSIGNED AUTO_INCREMENT NOT NULL, r_name VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(r_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, email_verified_at DATETIME DEFAULT NULL, password VARCHAR(128) NOT NULL COLLATE utf8mb4_unicode_ci, remember_token VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX users_email_unique (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE recipe');
    }
}
