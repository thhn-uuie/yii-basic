<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nguoidung".
 *
 * @property string $name
 * @property string $email
 * @property string $address
 */
class UserDemo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nguoidung';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address'], 'required'],
            [['name', 'email', 'address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
        ];
    }
}
