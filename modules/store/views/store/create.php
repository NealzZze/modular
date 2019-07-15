<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Store_Items */

$this->title = 'Create Store Items';
$this->params['breadcrumbs'][] = ['label' => 'Store Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store--items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
