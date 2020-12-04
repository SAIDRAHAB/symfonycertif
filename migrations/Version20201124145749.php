<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124145749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, score DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_user (jeux_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F8FA9024EC2AA9D2 (jeux_id), INDEX IDX_F8FA9024A76ED395 (user_id), PRIMARY KEY(jeux_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeux_user ADD CONSTRAINT FK_F8FA9024EC2AA9D2 FOREIGN KEY (jeux_id) REFERENCES jeux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_user ADD CONSTRAINT FK_F8FA9024A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux_user DROP FOREIGN KEY FK_F8FA9024EC2AA9D2');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE jeux_user');
    }
}
