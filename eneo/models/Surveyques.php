<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey_ques".
 *
 * @property integer $id
 * @property string $q
 * @property string $opt
 */
class Surveyques extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'survey_ques';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q'], 'required'],
            [['opt'], 'string'],
            [['q'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'q' => 'Q',
            'opt' => 'Opt',
        ];
    }
}
