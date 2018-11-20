<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117113821 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE invoice_details (id INT AUTO_INCREMENT NOT NULL, invoice_id INT DEFAULT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, name LONGTEXT DEFAULT NULL, quantity NUMERIC(10, 2) NOT NULL, vat_rate NUMERIC(10, 2) NOT NULL, amount NUMERIC(10, 2) NOT NULL, discount1 NUMERIC(10, 2) DEFAULT NULL, discount2 NUMERIC(10, 2) DEFAULT NULL, position INT NOT NULL, creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, update_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_80FF3D592989F1FD (invoice_id), INDEX IDX_80FF3D59DE12AB56 (created_by), INDEX IDX_80FF3D5916FE72E1 (updated_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoices (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, billing_address_id INT DEFAULT NULL, delivery_address_id INT DEFAULT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, number VARCHAR(20) NOT NULL, name VARCHAR(200) NOT NULL, reference VARCHAR(200) DEFAULT NULL, comment LONGTEXT DEFAULT NULL, creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, update_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, status VARCHAR(20) NOT NULL, due_date DATETIME DEFAULT NULL, payment_date DATETIME DEFAULT NULL, INDEX IDX_6A2F2F959395C3F3 (customer_id), INDEX IDX_6A2F2F9579D0C0E4 (billing_address_id), INDEX IDX_6A2F2F95EBF23851 (delivery_address_id), INDEX IDX_6A2F2F95DE12AB56 (created_by), INDEX IDX_6A2F2F9516FE72E1 (updated_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_addresses (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, is_default TINYINT(1) DEFAULT \'0\', creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, update_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, name VARCHAR(250) NOT NULL, address1 VARCHAR(250) NOT NULL, address2 VARCHAR(250) NOT NULL, zip_code VARCHAR(10) NOT NULL, city VARCHAR(50) NOT NULL, INDEX IDX_C4378D0C9395C3F3 (customer_id), INDEX IDX_C4378D0CDE12AB56 (created_by), INDEX IDX_C4378D0C16FE72E1 (updated_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_contacts (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, phone VARCHAR(20) DEFAULT NULL, mobile VARCHAR(20) DEFAULT NULL, creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, update_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, email VARCHAR(250) NOT NULL, INDEX IDX_1F85565C9395C3F3 (customer_id), INDEX IDX_1F85565CDE12AB56 (created_by), INDEX IDX_1F85565C16FE72E1 (updated_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, type INT DEFAULT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, name VARCHAR(250) NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, color VARCHAR(7) DEFAULT NULL, creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, update_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_62534E218CDE5729 (type), INDEX IDX_62534E21DE12AB56 (created_by), INDEX IDX_62534E2116FE72E1 (updated_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, is_default TINYINT(1) DEFAULT \'0\', sale_coefficient DOUBLE PRECISION NOT NULL, is_public TINYINT(1) NOT NULL, creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, update_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, created_by INT DEFAULT NULL, updated_by INT DEFAULT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, phone VARCHAR(20) DEFAULT NULL, mobile VARCHAR(20) DEFAULT NULL, creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, update_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, email VARCHAR(250) NOT NULL, password VARCHAR(250) NOT NULL, roles JSON NOT NULL, INDEX IDX_1483A5E9DE12AB56 (created_by), INDEX IDX_1483A5E916FE72E1 (updated_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_details ADD CONSTRAINT FK_80FF3D592989F1FD FOREIGN KEY (invoice_id) REFERENCES invoices (id)');
        $this->addSql('ALTER TABLE invoice_details ADD CONSTRAINT FK_80FF3D59DE12AB56 FOREIGN KEY (created_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE invoice_details ADD CONSTRAINT FK_80FF3D5916FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE invoices ADD CONSTRAINT FK_6A2F2F959395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE invoices ADD CONSTRAINT FK_6A2F2F9579D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES customer_addresses (id)');
        $this->addSql('ALTER TABLE invoices ADD CONSTRAINT FK_6A2F2F95EBF23851 FOREIGN KEY (delivery_address_id) REFERENCES customer_addresses (id)');
        $this->addSql('ALTER TABLE invoices ADD CONSTRAINT FK_6A2F2F95DE12AB56 FOREIGN KEY (created_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE invoices ADD CONSTRAINT FK_6A2F2F9516FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customer_addresses ADD CONSTRAINT FK_C4378D0C9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE customer_addresses ADD CONSTRAINT FK_C4378D0CDE12AB56 FOREIGN KEY (created_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customer_addresses ADD CONSTRAINT FK_C4378D0C16FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customer_contacts ADD CONSTRAINT FK_1F85565C9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE customer_contacts ADD CONSTRAINT FK_1F85565CDE12AB56 FOREIGN KEY (created_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customer_contacts ADD CONSTRAINT FK_1F85565C16FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E218CDE5729 FOREIGN KEY (type) REFERENCES customer_types (id)');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E21DE12AB56 FOREIGN KEY (created_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E2116FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9DE12AB56 FOREIGN KEY (created_by) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E916FE72E1 FOREIGN KEY (updated_by) REFERENCES users (id)');

        $this->addSql('INSERT INTO customer_types(name, is_default, sale_coefficient, is_public) VALUES ("Professionnel", 1, 1, 1)');
        $this->addSql('INSERT INTO customer_types(name, sale_coefficient, is_public) VALUES ("Particulier", 1, 1)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invoice_details DROP FOREIGN KEY FK_80FF3D592989F1FD');
        $this->addSql('ALTER TABLE invoices DROP FOREIGN KEY FK_6A2F2F9579D0C0E4');
        $this->addSql('ALTER TABLE invoices DROP FOREIGN KEY FK_6A2F2F95EBF23851');
        $this->addSql('ALTER TABLE invoices DROP FOREIGN KEY FK_6A2F2F959395C3F3');
        $this->addSql('ALTER TABLE customer_addresses DROP FOREIGN KEY FK_C4378D0C9395C3F3');
        $this->addSql('ALTER TABLE customer_contacts DROP FOREIGN KEY FK_1F85565C9395C3F3');
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E218CDE5729');
        $this->addSql('ALTER TABLE invoice_details DROP FOREIGN KEY FK_80FF3D59DE12AB56');
        $this->addSql('ALTER TABLE invoice_details DROP FOREIGN KEY FK_80FF3D5916FE72E1');
        $this->addSql('ALTER TABLE invoices DROP FOREIGN KEY FK_6A2F2F95DE12AB56');
        $this->addSql('ALTER TABLE invoices DROP FOREIGN KEY FK_6A2F2F9516FE72E1');
        $this->addSql('ALTER TABLE customer_addresses DROP FOREIGN KEY FK_C4378D0CDE12AB56');
        $this->addSql('ALTER TABLE customer_addresses DROP FOREIGN KEY FK_C4378D0C16FE72E1');
        $this->addSql('ALTER TABLE customer_contacts DROP FOREIGN KEY FK_1F85565CDE12AB56');
        $this->addSql('ALTER TABLE customer_contacts DROP FOREIGN KEY FK_1F85565C16FE72E1');
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E21DE12AB56');
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E2116FE72E1');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9DE12AB56');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E916FE72E1');
        $this->addSql('DROP TABLE invoice_details');
        $this->addSql('DROP TABLE invoices');
        $this->addSql('DROP TABLE customer_addresses');
        $this->addSql('DROP TABLE customer_contacts');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE customer_types');
        $this->addSql('DROP TABLE users');
    }
}
