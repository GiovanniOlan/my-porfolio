<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_technologie}}`.
 */
class m230329_143225_create_project_technologie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_technologie}}', [
            'protec_id'   => $this->primaryKey()->comment('ID'),
            'protec_fkproject' => $this->integer()->notNull()->comment('Proyecto'),
            'protec_fktechnologie' => $this->integer()->notNull()->comment('Tecnologia'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project_technologie}}');
    }
}
