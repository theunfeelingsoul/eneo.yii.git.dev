<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video_cat".
 *
 * @property integer $id
 * @property string $cat_name
 * @property integer $user_id
 */
class Videocat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['cat_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => 'Cat Name',
            'user_id' => 'User ID',
        ];
    }
}
