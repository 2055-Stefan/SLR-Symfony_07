<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260306195843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds index event_starts_at_idx on event.starts_at';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX event_starts_at_idx ON event (starts_at)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX event_starts_at_idx');
    }
}