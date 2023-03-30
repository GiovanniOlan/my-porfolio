<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_technologie".
 *
 * @property int $tec_id ID
 * @property string $tec_name Nombre
 *
 * @property ProjectTechnologie[] $projectTechnologies
 */
class CatTechnologie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_technologie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tec_name'], 'required'],
            [['tec_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tec_id' => 'ID',
            'tec_name' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[ProjectTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTechnologies()
    {
        return $this->hasMany(ProjectTechnologie::class, ['protec_fktechnologie' => 'tec_id']);
    }
}
