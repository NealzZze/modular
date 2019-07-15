<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About page';
?>
<div class="site-about">
    <h1>WOW, </h1>
        Greetings <b><?php echo Yii::$app->user->identity->username ?></b>!
    <p>This is the <?= Html::encode($this->title) ?>. Only authorized users can see it </p>

</div>

