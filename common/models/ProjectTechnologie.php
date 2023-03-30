<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_technologie".
 *
 * @property int $protec_id ID
 * @property int $protec_fkproject Proyecto
 * @property int $protec_fktechnologie Tecnologia
 *
 * @property Project $protecFkproject
 * @property CatTechnologie $protecFktechnologie
 */
class ProjectTechnologie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_technologie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['protec_fkproject', 'protec_fktechnologie'], 'required'],
            [['protec_fkproject', 'protec_fktechnologie'], 'integer'],
            [['protec_fkproject'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['protec_fkproject' => 'pro_id']],
            [['protec_fktechnologie'], 'exist', 'skipOnError' => true, 'targetClass' => CatTechnologie::class, 'targetAttribute' => ['protec_fktechnologie' => 'tec_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'protec_id' => 'ID',
            'protec_fkproject' => 'Proyecto',
            'protec_fktechnologie' => 'Tecnologia',
        ];
    }

    /**
     * Gets query for [[ProtecFkproject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtecFkproject()
    {
        return $this->hasOne(Project::class, ['pro_id' => 'protec_fkproject']);
    }

    /**
     * Gets query for [[ProtecFktechnologie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtecFktechnologie()
    {
        return $this->hasOne(CatTechnologie::class, ['tec_id' => 'protec_fktechnologie']);
    }
}
