<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311064420 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achievement ADD description VARCHAR(255) DEFAULT \'\' NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_96737FF15E237E06 ON achievement (name)');
        $this->addSql('ALTER TABLE incentive ADD name VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE incentive ADD description VARCHAR(255) DEFAULT \'\' NOT NULL');
        $this->addSql('ALTER TABLE reward ADD description VARCHAR(255) DEFAULT \'\' NOT NULL');
        $this->addSql('ALTER TABLE reward ALTER cost SET DEFAULT \'0.00\'');
        $this->addSql('ALTER TABLE reward ALTER cost SET NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD email VARCHAR(60) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP email');
        $this->addSql('DROP INDEX UNIQ_96737FF15E237E06');
        $this->addSql('ALTER TABLE achievement DROP description');
        $this->addSql('ALTER TABLE incentive DROP name');
        $this->addSql('ALTER TABLE incentive DROP description');
        $this->addSql('ALTER TABLE reward DROP description');
        $this->addSql('ALTER TABLE reward ALTER cost DROP DEFAULT');
        $this->addSql('ALTER TABLE reward ALTER cost DROP NOT NULL');
    }
}
