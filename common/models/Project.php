<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $pro_id ID
 * @property string $pro_name Nombre
 * @property string $pro_description Descripción
 * @property int|null $pro_github Link de Github
 * @property int $pro_inproduction En Producción
 * @property int $pro_isfreelance Es Freelance
 *
 * @property ProjectImage[] $projectImages
 * @property ProjectTechnologie[] $projectTechnologies
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_name', 'pro_description', 'pro_inproduction', 'pro_isfreelance'], 'required'],
            [['pro_description'], 'string'],
            [['pro_github', 'pro_inproduction', 'pro_isfreelance'], 'integer'],
            [['pro_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'ID',
            'pro_name' => 'Nombre',
            'pro_description' => 'Descripción',
            'pro_github' => 'Link de Github',
            'pro_inproduction' => 'En Producción',
            'pro_isfreelance' => 'Es Freelance',
        ];
    }

    /**
     * Gets query for [[ProjectImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectImages()
    {
        return $this->hasMany(ProjectImage::class, ['proima_fkproject' => 'pro_id']);
    }

    /**
     * Gets query for [[ProjectTechnologies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTechnologies()
    {
        return $this->hasMany(ProjectTechnologie::class, ['protec_fkproject' => 'pro_id']);
    }
}
