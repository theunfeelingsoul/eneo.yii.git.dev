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
    /**
     * @inheritdoc
     */

    public $imageFile;
    public static function tableName()
    {
        return 'category';
    }



    // const SCENARIO_UPDATE = 'update';

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
            // [['file_image'],'image'],
            [['img_path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','on'=>'create'],
            [['title', 'descrption'], 'required'],
            [['title', 'descrption'], 'string', 'max' => 255]
        ];
    }

    public function upload()
    {   
        // only validate two fields
        // because img_path is is not there 
        if ($this->validate(array('title', 'descrption'))) {
            // upload the image
            $this->imageFile->saveAs('images/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);

            // return the name
            // return $This->imageFile->baseName . '.' . $this->imageFile->extension;
            return true;
        } else {
            echo "failed validation";
            exit();
            return false;
        }
    }

//     if($model->validate(array('attribute_name')) 
//      // valid
// }

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
