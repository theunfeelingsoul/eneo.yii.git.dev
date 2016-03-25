<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "eneobizinfo".
 *
 * @property integer $id
 * @property string $tel
 * @property string $website
 * @property string $name
 * @property string $des
 * @property string $highlights
 * @property string $address
 * @property string $cat_list_img_path
 * @property string $cat_id
 * @property string $geocode
 * @property string $user_id
 */
class Eneobizinfo extends \yii\db\ActiveRecord
{

    // will be used to store the image data
    public $imageFile;

    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eneobizinfo';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_list_img_path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','on'=>'create'], 
            [['tel', 'website', 'name', 'des', 'highlights', 'address','cat_id','user_id'], 'required'],
            [['des'], 'string'],
            [['tel', 'website', 'name', 'highlights', 'address','geocode'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => 'Phone',
            'website' => 'Website',
            'name' => 'Business Name',
            'des' => 'Business Description',
            'highlights' => 'Highlights',
            'address' => 'Address',
            'cat_list_img_path' => 'Category List Image',
            'cat_id' => 'Business Category',
            'geocode' => 'Geocode',
            'user_id' => 'user_id',
        ];
    }

     // this helps ignore img_path when updating
    // i.e. making it not required
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['tel', 'website', 'name', 'highlights', 'address','des','cat_id','user_id'];// only validate these attibutes on update
        return $scenarios;
    }

    /**
     * Saves the uploaded image to the a folder
     * If upload is succesful it returns true
     */
    public function upload($img_name)
    {   
        // only validate two fields
        // because img_path is is not there 
        if ($this->validate(array('tel', 'website', 'name', 'highlights', 'address','des','cat_id','user_id'))) {
            // upload the image
            $this->imageFile->saveAs('images/uploads/cat/' . $img_name . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    } // end upload()










}// end class
