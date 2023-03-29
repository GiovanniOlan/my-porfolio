<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cat_technologie}}`.
 */
class m230329_143212_create_cat_technologie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cat_technologie}}', [
            'tec_id'   => $this->primaryKey()->comment('ID'),
            'tec_name' => $this->string(30)->notNull()->comment('Nombre'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cat_technologie}}');
    }
}
