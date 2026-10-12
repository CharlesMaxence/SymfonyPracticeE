<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261012123128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_answer (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(2550) NOT NULL, is_correct TINYINT NOT NULL, question_id INT DEFAULT NULL, INDEX IDX_577B239A1E27F6BF (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_question (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(2550) NOT NULL, explanation VARCHAR(2550) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE tbl_answer ADD CONSTRAINT FK_577B239A1E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id)');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY `FK_DADD4A251E27F6BF`');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE question');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(2550) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, is_correct TINYINT NOT NULL, question_id INT DEFAULT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(2550) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, explanation VARCHAR(2550) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT `FK_DADD4A251E27F6BF` FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE tbl_answer DROP FOREIGN KEY FK_577B239A1E27F6BF');
        $this->addSql('DROP TABLE tbl_answer');
        $this->addSql('DROP TABLE tbl_question');
    }
}
