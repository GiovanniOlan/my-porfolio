<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m230329_143059_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'pro_id'             => $this->primaryKey()->comment('ID'),
            'pro_name'           => $this->string(30)->notNull()->comment('Nombre'),
            'pro_description'    => $this->text()->notNull()->comment('Descripción'),
            'pro_github'         => $this->tinyInteger(2)->comment('Link de Github'),
            'pro_inproduction'   => $this->tinyInteger(2)->notNull()->comment('En Producción'),
            'pro_isfreelance'   => $this->tinyInteger(2)->notNull()->comment('Es Freelance'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project}}');
    }
}
