<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Store_Items */

$this->title = 'Update Store Items: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Store Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store--items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
