<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Student $modelStudent */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($modelStudent, 'HOSV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelStudent, 'TEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelStudent, 'MASV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelStudent, 'MAKHOA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelStudent, 'country')->dropDownList($dtcountry, ['promt'=>'----Lua chon----']) ?>

    <?= $form->field($modelStudent, 'fileName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelStudent, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
