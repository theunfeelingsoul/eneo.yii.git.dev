<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "webq".
 *
 * @property integer $id
 * @property string $q
 */
class Webq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['q'], 'required'],
            [['q'], 'string']
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
        ];
    }
}
