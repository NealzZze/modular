<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Store_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Store Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store--items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Store Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'name',
            'price',
            ['class' => 'app\modules\store\components\ActionColumnUpdated'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>