<?php
use yii\helpers\Html;

$this->title = 'About page';
?>
<link rel="stylesheet" href="frontend/css/style.css">
<div class="site-about">
    <h1>WOW, </h1>
    Greetings <b><?php echo Yii::$app->user->identity->username ?></b>!
    <p>This is the <?= Html::encode($this->title) ?>. Only authorized users can see it </p>
</div>