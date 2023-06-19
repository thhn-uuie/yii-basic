<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\form\UserForm;

class UserController extends Controller {
    public function actionUser() {

        $model = new UserForm();

        // dữ liệu load vào $model thành công và hợp lệ
        if ($model -> load(Yii::$app->request->post()) && $model -> validate()) {
            return $this -> render('user-confirm', [
                'model' => $model,
            ]);
        } else {
            return $this -> render('user', [
                'model' => $model,
            ]);
        }
    }
}