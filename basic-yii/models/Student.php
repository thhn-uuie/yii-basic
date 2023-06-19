<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $HOSV
 * @property string $TEN
 * @property string $MASV
 * @property string $MAKHOA
 * @property string|null $country
 * @property string $path
 * @property string $fileName
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HOSV', 'TEN', 'MASV', 'MAKHOA',  'fileName', 'path'], 'required'],
            [['HOSV', 'TEN', 'country'], 'string', 'max' => 50],
            [['MASV', 'MAKHOA'], 'string', 'max' => 10],
            [['path', 'fileName'], 'string', 'max' => 255],
            [['MASV'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'HOSV' => 'Hosv',
            'TEN' => 'Ten',
            'MASV' => 'Masv',
            'MAKHOA' => 'Makhoa',
            'country' => 'Country',
            'fileName' => 'File Name',
            'path' => 'Path',
            
        ];
    }

    public function upload()  
  {  
      if ($this->validate()) {  
          foreach ($this->file as $file) {  
              $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);  
          }  
          return true;  
      } else {  
          return false;  
      }  
  }  
}
