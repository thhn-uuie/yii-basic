<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="col-lg-4">
            <h2>Heading</h2>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

            <?= $form->field($model, 'imageFile')->fileInput() ?>
            

            <button>Resize</button>
            <?php ActiveForm::end() ?>
            
        </div>