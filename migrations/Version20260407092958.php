<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260407092958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'blog tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "blog_post" (id UUID NOT NULL, title VARCHAR(128) NOT NULL, slug VARCHAR(128) NOT NULL, summary VARCHAR(255) DEFAULT NULL, content BYTEA DEFAULT NULL, published BOOLEAN NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA5AE01D989D9B62 ON "blog_post" (slug)');
        $this->addSql('CREATE TABLE blog_post_tag (blog_post_id UUID NOT NULL, tag_id UUID NOT NULL, PRIMARY KEY (blog_post_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_2E931ED7A77FBEAF ON blog_post_tag (blog_post_id)');
        $this->addSql('CREATE INDEX IDX_2E931ED7BAD26311 ON blog_post_tag (tag_id)');
        $this->addSql('CREATE TABLE "blog_tag" (id UUID NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE blog_post_tag ADD CONSTRAINT FK_2E931ED7A77FBEAF FOREIGN KEY (blog_post_id) REFERENCES "blog_post" (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_post_tag ADD CONSTRAINT FK_2E931ED7BAD26311 FOREIGN KEY (tag_id) REFERENCES "blog_tag" (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog_post_tag DROP CONSTRAINT FK_2E931ED7A77FBEAF');
        $this->addSql('ALTER TABLE blog_post_tag DROP CONSTRAINT FK_2E931ED7BAD26311');
        $this->addSql('DROP TABLE "blog_post"');
        $this->addSql('DROP TABLE blog_post_tag');
        $this->addSql('DROP TABLE "blog_tag"');
    }
}
