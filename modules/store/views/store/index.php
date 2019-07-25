<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Store Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store--items-index">
<h1><?= Html::encode($this->title) ?></h1>
<p>
<?= Html::a('Create Store Items', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?php Pjax::begin(); ?>
<?php 
    ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
            'price',
            ['class' => 'app\modules\store\components\ActionColumnUpdated'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>