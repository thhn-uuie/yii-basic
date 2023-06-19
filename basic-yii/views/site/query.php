<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Query Builder';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::encode($data->getData()) ?>
    <code><?= __FILE__ ?></code>
</div>
