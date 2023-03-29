<?php

use yii\db\Migration;

/**
 * Class m230329_144034_add_foreingkey_to_proima_fkproject_column
 */
class m230329_144034_add_foreingkey_to_proima_fkproject_column_of_project_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('project_images_ibfk_1', 'project_image', 'proima_fkproject', 'project', 'pro_id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'project_images_ibfk_1',
            'project_image'
        );
    }
}
