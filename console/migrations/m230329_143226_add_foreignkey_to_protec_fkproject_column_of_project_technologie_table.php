<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_technologie}}`.
 */
class m230329_143226_add_foreignkey_to_protec_fkproject_column_of_project_technologie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('project_technologie_ibfk_1', 'project_technologie', 'protec_fkproject', 'project', 'pro_id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'project_technologie_ibfk_1',
            'project_technologie'
        );
    }
}
