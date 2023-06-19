<?php

namespace app\models\form;

use Yii;
use yii\base\Model;

class UserForm extends \yii\db\ActiveRecord {
    public $name;
    public $contact;
    public $email;

    public static function tableName() {
        return 'user';
    }

    // rule() trả về 1 mảng -> kiểm tra dữ liệu được nhập vào.
    public function rules() {
        return [

            // các trường đánh dấu là bắt buộc
            [['name', 'contact', 'email'], 'required'],

            // email nhập vào phải là 1 email hợp lệ
            ['email', 'email'],
        ];
    }

}