<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_image}}`.
 */
class m230329_143245_create_project_image_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%project_image}}', [
            'proima_id'   => $this->primaryKey()->comment('ID'),
            'proima_path' => $this->string()->notNull()->comment('Dirección'),
            'proima_fkproject' => $this->integer()->notNull()->comment('Proyecto'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project_image}}');
    }
}
