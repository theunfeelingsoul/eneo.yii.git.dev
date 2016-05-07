<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $comment
 * @property integer $bp
 * @property integer $vp
 * @property string $biz_id
 * @property string $user_id
 * @property string $post_date
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string'],
            [['bp', 'vp','post_date'], 'integer'],
            [['biz_id','user_id'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'bp' => 'Bp',
            'vp' => 'Vp',
            'biz_id' => 'Biz ID',
            'user_id' => 'user_id',
            'post_date' => 'Date posted',
        ];
    }
}
