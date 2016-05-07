<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "webans".
 *
 * @property integer $id
 * @property integer $qid
 * @property string $ans
 */
class Webans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qid', 'ans'], 'required'],
            // [['qid'], 'integer'],
            [['qid','ans'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Question id',
            'qid' => 'Question',
            'ans' => 'Your answer',
        ];
    }
}
