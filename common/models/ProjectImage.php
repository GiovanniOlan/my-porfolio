<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_image".
 *
 * @property int $proima_id ID
 * @property string $proima_path Dirección
 * @property int $proima_fkproject Proyecto
 *
 * @property Project $proimaFkproject
 */
class ProjectImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proima_path', 'proima_fkproject'], 'required'],
            [['proima_fkproject'], 'integer'],
            [['proima_path'], 'string', 'max' => 255],
            [['proima_fkproject'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['proima_fkproject' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'proima_id' => 'ID',
            'proima_path' => 'Dirección',
            'proima_fkproject' => 'Proyecto',
        ];
    }

    /**
     * Gets query for [[ProimaFkproject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProimaFkproject()
    {
        return $this->hasOne(Project::class, ['pro_id' => 'proima_fkproject']);
    }
}
