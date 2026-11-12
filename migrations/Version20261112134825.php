<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261112134825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_answer (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(2550) NOT NULL, is_correct TINYINT NOT NULL, question_id INT DEFAULT NULL, INDEX IDX_577B239A1E27F6BF (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_author (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) DEFAULT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(255) DEFAULT NULL, zip VARCHAR(10) DEFAULT NULL, town VARCHAR(50) DEFAULT NULL, country_id INT DEFAULT NULL, INDEX IDX_3009B177F92F3E70 (country_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_book (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, nbrpages INT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE book_author (book_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_9478D34516A2B381 (book_id), INDEX IDX_9478D345F675F31B (author_id), PRIMARY KEY (book_id, author_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_credit (id INT AUTO_INCREMENT NOT NULL, author_name VARCHAR(50) DEFAULT NULL, source_url VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE image_credit (image_id INT NOT NULL, credit_id INT NOT NULL, INDEX IDX_B3DC30363DA5256D (image_id), INDEX IDX_B3DC3036CE062FF9 (credit_id), PRIMARY KEY (image_id, credit_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE title (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE tbl_answer ADD CONSTRAINT FK_577B239A1E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id)');
        $this->addSql('ALTER TABLE tbl_author ADD CONSTRAINT FK_3009B177F92F3E70 FOREIGN KEY (country_id) REFERENCES tbl_country (id)');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D34516A2B381 FOREIGN KEY (book_id) REFERENCES tbl_book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D345F675F31B FOREIGN KEY (author_id) REFERENCES tbl_author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_credit ADD CONSTRAINT FK_B3DC30363DA5256D FOREIGN KEY (image_id) REFERENCES tbl_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_credit ADD CONSTRAINT FK_B3DC3036CE062FF9 FOREIGN KEY (credit_id) REFERENCES tbl_credit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_anwser DROP FOREIGN KEY `FK_DF101C111E27F6BF`');
        $this->addSql('ALTER TABLE tbl_selected_answer DROP FOREIGN KEY `FK_F85BB2EC53B6268F`');
        $this->addSql('ALTER TABLE tbl_selected_answer DROP FOREIGN KEY `FK_F85BB2ECAA334807`');
        $this->addSql('ALTER TABLE tbl_statistic DROP FOREIGN KEY `FK_2113290F1E27F6BF`');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE slide_show');
        $this->addSql('DROP TABLE tbl_anwser');
        $this->addSql('DROP TABLE tbl_selected_answer');
        $this->addSql('DROP TABLE tbl_statistic');
        $this->addSql('ALTER TABLE tbl_question DROP FOREIGN KEY `FK_E1C4AF6359027487`');
        $this->addSql('DROP INDEX IDX_E1C4AF6359027487 ON tbl_question');
        $this->addSql('ALTER TABLE tbl_question DROP explication, DROP theme_id');
        $this->addSql('ALTER TABLE tbl_user ADD is_verified TINYINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE credit (id INT AUTO_INCREMENT NOT NULL, author VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, lien_source VARCHAR(2550) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(2550) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE slide_show (id INT AUTO_INCREMENT NOT NULL, text VARCHAR(2550) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_uca1400_ai_ci`, ordre INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tbl_anwser (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, is_right TINYINT NOT NULL, question_id INT DEFAULT NULL, INDEX IDX_DF101C111E27F6BF (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tbl_selected_answer (id INT AUTO_INCREMENT NOT NULL, selected_answer_x_time INT DEFAULT NULL, statistic_id INT DEFAULT NULL, answer_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_F85BB2ECAA334807 (answer_id), INDEX IDX_F85BB2EC53B6268F (statistic_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tbl_statistic (id INT AUTO_INCREMENT NOT NULL, t_moyen NUMERIC(10, 2) DEFAULT NULL, t_min NUMERIC(10, 2) DEFAULT NULL, t_max NUMERIC(10, 2) DEFAULT NULL, question_asked_x_time_ INT DEFAULT NULL, question_id INT NOT NULL, UNIQUE INDEX UNIQ_2113290F1E27F6BF (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tbl_anwser ADD CONSTRAINT `FK_DF101C111E27F6BF` FOREIGN KEY (question_id) REFERENCES tbl_question (id)');
        $this->addSql('ALTER TABLE tbl_selected_answer ADD CONSTRAINT `FK_F85BB2EC53B6268F` FOREIGN KEY (statistic_id) REFERENCES tbl_statistic (id)');
        $this->addSql('ALTER TABLE tbl_selected_answer ADD CONSTRAINT `FK_F85BB2ECAA334807` FOREIGN KEY (answer_id) REFERENCES tbl_anwser (id)');
        $this->addSql('ALTER TABLE tbl_statistic ADD CONSTRAINT `FK_2113290F1E27F6BF` FOREIGN KEY (question_id) REFERENCES tbl_question (id)');
        $this->addSql('ALTER TABLE tbl_answer DROP FOREIGN KEY FK_577B239A1E27F6BF');
        $this->addSql('ALTER TABLE tbl_author DROP FOREIGN KEY FK_3009B177F92F3E70');
        $this->addSql('ALTER TABLE book_author DROP FOREIGN KEY FK_9478D34516A2B381');
        $this->addSql('ALTER TABLE book_author DROP FOREIGN KEY FK_9478D345F675F31B');
        $this->addSql('ALTER TABLE image_credit DROP FOREIGN KEY FK_B3DC30363DA5256D');
        $this->addSql('ALTER TABLE image_credit DROP FOREIGN KEY FK_B3DC3036CE062FF9');
        $this->addSql('DROP TABLE tbl_answer');
        $this->addSql('DROP TABLE tbl_author');
        $this->addSql('DROP TABLE tbl_book');
        $this->addSql('DROP TABLE book_author');
        $this->addSql('DROP TABLE tbl_country');
        $this->addSql('DROP TABLE tbl_credit');
        $this->addSql('DROP TABLE tbl_image');
        $this->addSql('DROP TABLE image_credit');
        $this->addSql('DROP TABLE title');
        $this->addSql('ALTER TABLE tbl_question ADD explication LONGTEXT DEFAULT NULL, ADD theme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tbl_question ADD CONSTRAINT `FK_E1C4AF6359027487` FOREIGN KEY (theme_id) REFERENCES tbl_theme (id)');
        $this->addSql('CREATE INDEX IDX_E1C4AF6359027487 ON tbl_question (theme_id)');
        $this->addSql('ALTER TABLE tbl_user DROP is_verified');
    }
}
