<?php

namespace app\models;


use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property string $descrption
 * @property string $img_path
 */
class Category extends \yii\db\ActiveRecord
{
    
    // will be used to store the image data
    public $imageFile;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }



    // this helps ignore img_path when updating
    // i.e. making it not required
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['title', 'descrption'];//Scenario Values Only Accepted
        return $scenarios;
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // on create , means img_path will be required when creating only
            [['img_path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','on'=>'create'], 
            [['title', 'descrption'], 'required'],
            [['title', 'descrption'], 'string', 'max' => 255]
        ];
    }

    /**
     * Saves the uploaded image to the a folder
     * If upload is succesful it returns true
     */
    public function upload($img_name)
    {   
        // only validate two fields
        // because img_path is is not there 
        if ($this->validate(array('title', 'descrption'))) {
            // upload the image

            // $this->imageFile->saveAs('images/uploads/cat/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageFile->saveAs('images/uploads/cat/' .$img_name. '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'descrption' => 'Descrption',
            'img_path' => 'Img Path',
        ];
    }

  
}
