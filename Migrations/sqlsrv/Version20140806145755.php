<?php

namespace Claroline\CoreBundle\Migrations\sqlsrv;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2014/08/06 02:57:57
 */
class Version20140806145755 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE claro_user_model (
                user_id INT NOT NULL, 
                model_id INT NOT NULL, 
                PRIMARY KEY (user_id, model_id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_57DE02DBA76ED395 ON claro_user_model (user_id)
        ");
        $this->addSql("
            CREATE INDEX IDX_57DE02DB7975B7E7 ON claro_user_model (model_id)
        ");
        $this->addSql("
            CREATE TABLE claro_group_model (
                group_id INT NOT NULL, 
                model_id INT NOT NULL, 
                PRIMARY KEY (group_id, model_id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_C6568DFFE54D947 ON claro_group_model (group_id)
        ");
        $this->addSql("
            CREATE INDEX IDX_C6568DF7975B7E7 ON claro_group_model (model_id)
        ");
        $this->addSql("
            CREATE TABLE claro_model (
                id INT IDENTITY NOT NULL, 
                workspace_id INT, 
                name NVARCHAR(255) NOT NULL, 
                PRIMARY KEY (id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_5D96A5CB82D40A1F ON claro_model (workspace_id)
        ");
        $this->addSql("
            CREATE TABLE claro_group_home_tab (
                hometab_id INT NOT NULL, 
                model_id INT NOT NULL, 
                PRIMARY KEY (hometab_id, model_id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_E8BB4D96CCE862F ON claro_group_home_tab (hometab_id)
        ");
        $this->addSql("
            CREATE INDEX IDX_E8BB4D967975B7E7 ON claro_group_home_tab (model_id)
        ");
        $this->addSql("
            CREATE TABLE claro_resource_model (
                id INT IDENTITY NOT NULL, 
                model_id INT NOT NULL, 
                isCopy BIT NOT NULL, 
                resourceNode_id INT NOT NULL, 
                PRIMARY KEY (id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_FC03303AB87FAB32 ON claro_resource_model (resourceNode_id)
        ");
        $this->addSql("
            CREATE INDEX IDX_FC03303A7975B7E7 ON claro_resource_model (model_id)
        ");
        $this->addSql("
            ALTER TABLE claro_user_model 
            ADD CONSTRAINT FK_57DE02DBA76ED395 FOREIGN KEY (user_id) 
            REFERENCES claro_user (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_user_model 
            ADD CONSTRAINT FK_57DE02DB7975B7E7 FOREIGN KEY (model_id) 
            REFERENCES claro_model (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_group_model 
            ADD CONSTRAINT FK_C6568DFFE54D947 FOREIGN KEY (group_id) 
            REFERENCES claro_group (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_group_model 
            ADD CONSTRAINT FK_C6568DF7975B7E7 FOREIGN KEY (model_id) 
            REFERENCES claro_model (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_model 
            ADD CONSTRAINT FK_5D96A5CB82D40A1F FOREIGN KEY (workspace_id) 
            REFERENCES claro_workspace (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_group_home_tab 
            ADD CONSTRAINT FK_E8BB4D96CCE862F FOREIGN KEY (hometab_id) 
            REFERENCES claro_home_tab (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_group_home_tab 
            ADD CONSTRAINT FK_E8BB4D967975B7E7 FOREIGN KEY (model_id) 
            REFERENCES claro_model (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_resource_model 
            ADD CONSTRAINT FK_FC03303AB87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE claro_resource_model 
            ADD CONSTRAINT FK_FC03303A7975B7E7 FOREIGN KEY (model_id) 
            REFERENCES claro_model (id) 
            ON DELETE CASCADE
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE claro_user_model 
            DROP CONSTRAINT FK_57DE02DB7975B7E7
        ");
        $this->addSql("
            ALTER TABLE claro_group_model 
            DROP CONSTRAINT FK_C6568DF7975B7E7
        ");
        $this->addSql("
            ALTER TABLE claro_group_home_tab 
            DROP CONSTRAINT FK_E8BB4D967975B7E7
        ");
        $this->addSql("
            ALTER TABLE claro_resource_model 
            DROP CONSTRAINT FK_FC03303A7975B7E7
        ");
        $this->addSql("
            DROP TABLE claro_user_model
        ");
        $this->addSql("
            DROP TABLE claro_group_model
        ");
        $this->addSql("
            DROP TABLE claro_model
        ");
        $this->addSql("
            DROP TABLE claro_group_home_tab
        ");
        $this->addSql("
            DROP TABLE claro_resource_model
        ");
    }
}