<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_technologie}}`.
 */
class m230329_143227_add_foreignkey_to_protec_fktechnologie_column_of_project_technologie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('project_technologie_ibfk_2', 'project_technologie', 'protec_fktechnologie', 'cat_technologie', 'tec_id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'project_technologie_ibfk_2',
            'project_technologie'
        );
    }
}
