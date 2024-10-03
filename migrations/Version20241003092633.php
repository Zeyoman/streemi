<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241003092633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_media (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_media_media (categorie_media_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_AACB43B4D2189C1F (categorie_media_id), INDEX IDX_AACB43B4EA9FDD75 (media_id), PRIMARY KEY(categorie_media_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_media_categorie (categorie_media_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_B1861314D2189C1F (categorie_media_id), INDEX IDX_B1861314BCF5E72D (categorie_id), PRIMARY KEY(categorie_media_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, media_id_id INT DEFAULT NULL, content LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_9474526C9D86650F (user_id_id), INDEX IDX_9474526C605D5AE6 (media_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment_comment (comment_source INT NOT NULL, comment_target INT NOT NULL, INDEX IDX_6707307C95992761 (comment_source), INDEX IDX_6707307C8C7C77EE (comment_target), PRIMARY KEY(comment_source, comment_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, duration TIME NOT NULL, release_date DATE NOT NULL, INDEX IDX_DDAA1CDA68756988 (season_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, code VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, watched_history_id INT DEFAULT NULL, media_type VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, short_description LONGTEXT DEFAULT NULL, long_description LONGTEXT NOT NULL, release_date DATE DEFAULT NULL, cover_image VARCHAR(255) DEFAULT NULL, staff JSON DEFAULT NULL, cast JSON DEFAULT NULL, INDEX IDX_6A2CA10C72CF77CB (watched_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language_media (media_language_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_B441511D7599C867 (media_language_id), INDEX IDX_B441511DEA9FDD75 (media_id), PRIMARY KEY(media_language_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language_language (media_language_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_EE8044747599C867 (media_language_id), INDEX IDX_EE80447482F1BAF4 (language_id), PRIMARY KEY(media_language_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D782112D9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media (id INT AUTO_INCREMENT NOT NULL, added_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media_playlist (playlist_media_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_63FEBFA717421B18 (playlist_media_id), INDEX IDX_63FEBFA76BBD148 (playlist_id), PRIMARY KEY(playlist_media_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media_media (playlist_media_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_50F8E39217421B18 (playlist_media_id), INDEX IDX_50F8E392EA9FDD75 (media_id), PRIMARY KEY(playlist_media_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription (id INT AUTO_INCREMENT NOT NULL, subscribed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription_user (playlist_subscription_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C8528656B2A122C2 (playlist_subscription_id), INDEX IDX_C8528656A76ED395 (user_id), PRIMARY KEY(playlist_subscription_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription_playlist (playlist_subscription_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_67132B44B2A122C2 (playlist_subscription_id), INDEX IDX_67132B446BBD148 (playlist_id), PRIMARY KEY(playlist_subscription_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, serie_id_id INT DEFAULT NULL, season_number INT NOT NULL, INDEX IDX_F0E45BA9B748AAC3 (serie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, price NUMERIC(10, 2) DEFAULT NULL, duration_in_month INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_history (id INT AUTO_INCREMENT NOT NULL, start_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', end_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_history_subscription (subscription_history_id INT NOT NULL, subscription_id INT NOT NULL, INDEX IDX_EED8FEBCDCE0C437 (subscription_history_id), INDEX IDX_EED8FEBC9A1887DC (subscription_id), PRIMARY KEY(subscription_history_id, subscription_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, current_subscription_id_id INT DEFAULT NULL, username VARCHAR(100) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, account_status VARCHAR(255) NOT NULL, INDEX IDX_8D93D6494924D8AF (current_subscription_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watched_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, last_watched DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', number_of_view INT NOT NULL, INDEX IDX_945B365A9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_media_media ADD CONSTRAINT FK_AACB43B4D2189C1F FOREIGN KEY (categorie_media_id) REFERENCES categorie_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media_media ADD CONSTRAINT FK_AACB43B4EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media_categorie ADD CONSTRAINT FK_B1861314D2189C1F FOREIGN KEY (categorie_media_id) REFERENCES categorie_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media_categorie ADD CONSTRAINT FK_B1861314BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE comment_comment ADD CONSTRAINT FK_6707307C95992761 FOREIGN KEY (comment_source) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment_comment ADD CONSTRAINT FK_6707307C8C7C77EE FOREIGN KEY (comment_target) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA68756988 FOREIGN KEY (season_id_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C72CF77CB FOREIGN KEY (watched_history_id) REFERENCES watched_history (id)');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511D7599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE8044747599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE80447482F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA717421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA76BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E39217421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E392EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B44B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B446BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9B748AAC3 FOREIGN KEY (serie_id_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE subscription_history_subscription ADD CONSTRAINT FK_EED8FEBCDCE0C437 FOREIGN KEY (subscription_history_id) REFERENCES subscription_history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription_history_subscription ADD CONSTRAINT FK_EED8FEBC9A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494924D8AF FOREIGN KEY (current_subscription_id_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE watched_history ADD CONSTRAINT FK_945B365A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_media_media DROP FOREIGN KEY FK_AACB43B4D2189C1F');
        $this->addSql('ALTER TABLE categorie_media_media DROP FOREIGN KEY FK_AACB43B4EA9FDD75');
        $this->addSql('ALTER TABLE categorie_media_categorie DROP FOREIGN KEY FK_B1861314D2189C1F');
        $this->addSql('ALTER TABLE categorie_media_categorie DROP FOREIGN KEY FK_B1861314BCF5E72D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C605D5AE6');
        $this->addSql('ALTER TABLE comment_comment DROP FOREIGN KEY FK_6707307C95992761');
        $this->addSql('ALTER TABLE comment_comment DROP FOREIGN KEY FK_6707307C8C7C77EE');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA68756988');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C72CF77CB');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511D7599C867');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511DEA9FDD75');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE8044747599C867');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE80447482F1BAF4');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112D9D86650F');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA717421B18');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA76BBD148');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E39217421B18');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E392EA9FDD75');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656B2A122C2');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656A76ED395');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B44B2A122C2');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B446BBD148');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9B748AAC3');
        $this->addSql('ALTER TABLE subscription_history_subscription DROP FOREIGN KEY FK_EED8FEBCDCE0C437');
        $this->addSql('ALTER TABLE subscription_history_subscription DROP FOREIGN KEY FK_EED8FEBC9A1887DC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494924D8AF');
        $this->addSql('ALTER TABLE watched_history DROP FOREIGN KEY FK_945B365A9D86650F');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_media');
        $this->addSql('DROP TABLE categorie_media_media');
        $this->addSql('DROP TABLE categorie_media_categorie');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE comment_comment');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('DROP TABLE media_language_media');
        $this->addSql('DROP TABLE media_language_language');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE playlist_media');
        $this->addSql('DROP TABLE playlist_media_playlist');
        $this->addSql('DROP TABLE playlist_media_media');
        $this->addSql('DROP TABLE playlist_subscription');
        $this->addSql('DROP TABLE playlist_subscription_user');
        $this->addSql('DROP TABLE playlist_subscription_playlist');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE subscription_history');
        $this->addSql('DROP TABLE subscription_history_subscription');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE watched_history');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
