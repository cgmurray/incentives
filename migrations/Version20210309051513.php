<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309051513 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE achievement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE birth_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE earned_achievement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_structure_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE foo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE health_metric_log_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE incentive_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE incentive_managing_partner_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE incentive_program_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE offered_reward_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE program_employee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reward_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_program_employee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE achievement (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE birth (id INT NOT NULL, user_id INT DEFAULT NULL, stats TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3CB1821FA76ED395 ON birth (user_id)');
        $this->addSql('COMMENT ON COLUMN birth.stats IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE earned_achievement (id INT NOT NULL, achievement_id INT DEFAULT NULL, program_employee_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_12CD6BB7B3EC99FE ON earned_achievement (achievement_id)');
        $this->addSql('CREATE INDEX IDX_12CD6BB74019BC34 ON earned_achievement (program_employee_id)');
        $this->addSql('CREATE TABLE employer (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE event (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE event_structure (id INT NOT NULL, achievement_id INT DEFAULT NULL, event_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, is_birth BOOLEAN DEFAULT \'false\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E99409D7B3EC99FE ON event_structure (achievement_id)');
        $this->addSql('CREATE INDEX IDX_E99409D771F7E88B ON event_structure (event_id)');
        $this->addSql('CREATE TABLE foo (id INT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE health_metric_log (id INT NOT NULL, user_id INT DEFAULT NULL, event_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8EC3F4DAA76ED395 ON health_metric_log (user_id)');
        $this->addSql('CREATE INDEX IDX_8EC3F4DA71F7E88B ON health_metric_log (event_id)');
        $this->addSql('CREATE TABLE incentive (id INT NOT NULL, program_id INT DEFAULT NULL, achievement_id INT DEFAULT NULL, reward_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F02B1CA63EB8070A ON incentive (program_id)');
        $this->addSql('CREATE INDEX IDX_F02B1CA6B3EC99FE ON incentive (achievement_id)');
        $this->addSql('CREATE INDEX IDX_F02B1CA6E466ACA1 ON incentive (reward_id)');
        $this->addSql('CREATE TABLE incentive_managing_partner (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE incentive_program (id INT NOT NULL, employer_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA62BE041CD9E7A ON incentive_program (employer_id)');
        $this->addSql('CREATE TABLE offered_reward (id INT NOT NULL, reward_id INT DEFAULT NULL, program_employee_id INT DEFAULT NULL, award_offered_ts TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, award_accepted_ts TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D96FC1A8E466ACA1 ON offered_reward (reward_id)');
        $this->addSql('CREATE INDEX IDX_D96FC1A84019BC34 ON offered_reward (program_employee_id)');
        $this->addSql('CREATE TABLE program_employee (id INT NOT NULL, employer_program_id INT DEFAULT NULL, employee_num VARCHAR(255) DEFAULT NULL, start_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DCAA8994DEEFB3AD ON program_employee (employer_program_id)');
        $this->addSql('CREATE TABLE reward (id INT NOT NULL, incentive_managing_partner_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, cost NUMERIC(10, 0) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4ED17253E79A9F6A ON reward (incentive_managing_partner_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_program_employee (id INT NOT NULL, program_employee_id INT DEFAULT NULL, user_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A1BFCB494019BC34 ON user_program_employee (program_employee_id)');
        $this->addSql('CREATE INDEX IDX_A1BFCB49A76ED395 ON user_program_employee (user_id)');
        $this->addSql('ALTER TABLE birth ADD CONSTRAINT FK_3CB1821FA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE earned_achievement ADD CONSTRAINT FK_12CD6BB7B3EC99FE FOREIGN KEY (achievement_id) REFERENCES achievement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE earned_achievement ADD CONSTRAINT FK_12CD6BB74019BC34 FOREIGN KEY (program_employee_id) REFERENCES program_employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_structure ADD CONSTRAINT FK_E99409D7B3EC99FE FOREIGN KEY (achievement_id) REFERENCES achievement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_structure ADD CONSTRAINT FK_E99409D771F7E88B FOREIGN KEY (event_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE health_metric_log ADD CONSTRAINT FK_8EC3F4DAA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE health_metric_log ADD CONSTRAINT FK_8EC3F4DA71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE incentive ADD CONSTRAINT FK_F02B1CA63EB8070A FOREIGN KEY (program_id) REFERENCES incentive_program (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE incentive ADD CONSTRAINT FK_F02B1CA6B3EC99FE FOREIGN KEY (achievement_id) REFERENCES achievement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE incentive ADD CONSTRAINT FK_F02B1CA6E466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE incentive_program ADD CONSTRAINT FK_FA62BE041CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offered_reward ADD CONSTRAINT FK_D96FC1A8E466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offered_reward ADD CONSTRAINT FK_D96FC1A84019BC34 FOREIGN KEY (program_employee_id) REFERENCES program_employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE program_employee ADD CONSTRAINT FK_DCAA8994DEEFB3AD FOREIGN KEY (employer_program_id) REFERENCES incentive_program (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reward ADD CONSTRAINT FK_4ED17253E79A9F6A FOREIGN KEY (incentive_managing_partner_id) REFERENCES incentive_managing_partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_program_employee ADD CONSTRAINT FK_A1BFCB494019BC34 FOREIGN KEY (program_employee_id) REFERENCES program_employee (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_program_employee ADD CONSTRAINT FK_A1BFCB49A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE earned_achievement DROP CONSTRAINT FK_12CD6BB7B3EC99FE');
        $this->addSql('ALTER TABLE event_structure DROP CONSTRAINT FK_E99409D7B3EC99FE');
        $this->addSql('ALTER TABLE incentive DROP CONSTRAINT FK_F02B1CA6B3EC99FE');
        $this->addSql('ALTER TABLE incentive_program DROP CONSTRAINT FK_FA62BE041CD9E7A');
        $this->addSql('ALTER TABLE event_structure DROP CONSTRAINT FK_E99409D771F7E88B');
        $this->addSql('ALTER TABLE health_metric_log DROP CONSTRAINT FK_8EC3F4DA71F7E88B');
        $this->addSql('ALTER TABLE reward DROP CONSTRAINT FK_4ED17253E79A9F6A');
        $this->addSql('ALTER TABLE incentive DROP CONSTRAINT FK_F02B1CA63EB8070A');
        $this->addSql('ALTER TABLE program_employee DROP CONSTRAINT FK_DCAA8994DEEFB3AD');
        $this->addSql('ALTER TABLE earned_achievement DROP CONSTRAINT FK_12CD6BB74019BC34');
        $this->addSql('ALTER TABLE offered_reward DROP CONSTRAINT FK_D96FC1A84019BC34');
        $this->addSql('ALTER TABLE user_program_employee DROP CONSTRAINT FK_A1BFCB494019BC34');
        $this->addSql('ALTER TABLE incentive DROP CONSTRAINT FK_F02B1CA6E466ACA1');
        $this->addSql('ALTER TABLE offered_reward DROP CONSTRAINT FK_D96FC1A8E466ACA1');
        $this->addSql('ALTER TABLE birth DROP CONSTRAINT FK_3CB1821FA76ED395');
        $this->addSql('ALTER TABLE health_metric_log DROP CONSTRAINT FK_8EC3F4DAA76ED395');
        $this->addSql('ALTER TABLE user_program_employee DROP CONSTRAINT FK_A1BFCB49A76ED395');
        $this->addSql('DROP SEQUENCE achievement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE birth_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE earned_achievement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_structure_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE foo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE health_metric_log_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE incentive_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE incentive_managing_partner_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE incentive_program_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE offered_reward_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE program_employee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reward_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_program_employee_id_seq CASCADE');
        $this->addSql('DROP TABLE achievement');
        $this->addSql('DROP TABLE birth');
        $this->addSql('DROP TABLE earned_achievement');
        $this->addSql('DROP TABLE employer');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_structure');
        $this->addSql('DROP TABLE foo');
        $this->addSql('DROP TABLE health_metric_log');
        $this->addSql('DROP TABLE incentive');
        $this->addSql('DROP TABLE incentive_managing_partner');
        $this->addSql('DROP TABLE incentive_program');
        $this->addSql('DROP TABLE offered_reward');
        $this->addSql('DROP TABLE program_employee');
        $this->addSql('DROP TABLE reward');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_program_employee');
    }
}
