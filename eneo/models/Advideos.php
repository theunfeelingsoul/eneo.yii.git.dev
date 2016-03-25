<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ad_videos".
 *
 * @property integer $id
 * @property string $title
 * @property string $des
 * @property string $url
 * @property string $vid_cat_id
 * @property string $biz_id
 * @property string $user_id
 */
class Advideos extends \yii\db\ActiveRecord
{
    // will be used to store the file data
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ad_videos';
    }

    public static function trunctateText($text)
    {
        return substr($text, 0, 200);;
    }

    // this helps ignore img_path when updating
    // i.e. making it not required
    // public function scenarios()
    // {
    //     $scenarios = parent::scenarios();
    //     $scenarios['update'] = ['title', 'url', 'vid_cat_id', 'biz_id', 'des'];//Scenario Values Only Accepted
    //     return $scenarios;
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'des','biz_id','url','user_id'], 'required'],
            [['des'], 'string'],
            [['title', 'vid_cat_id', 'biz_id'], 'string', 'max' => 255]
        ];
    }


     /**
     * Saves the uploaded image to the a folder
     * If upload is succesful it returns true
     */
    // public function upload($x)
    // {   
    //     // only validate two fields
    //     // because img_path is is not there 
        
    //         // upload the image
    //         // $this->imageFile->saveAs('images/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
    //         $this->imageFile->saveAs('images/uploads/' . $x . '.' . $this->imageFile->extension);
    //         return true;
        
            
        
    // }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'des' => 'Description',
            'url' => 'Paste Youtube Link here',
            'vid_cat_id' => 'Video Category',
            'biz_id' => 'Business Name',
            'user_id' => 'User ID',
        ];
    }
}
