<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $ID
 * @property string $Name
 */
class Image extends \yii\db\ActiveRecord
{
    public $image_upload;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Name','anh'], 'required'],
            [['ID'], 'integer'],
            [['Name','anh'], 'string', 'max' => 50],
            [['ID'], 'unique'],
            [['image_upload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'anh' => 'Anh',
            'image_upload' => "Image Upload"
        ];
    }
}
