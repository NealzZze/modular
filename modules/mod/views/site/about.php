<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About page';
?>
<link rel="stylesheet" href="frontend/css/style.css">
<div class="site-about">
    <h1>WOW, </h1>
    Greetings <b><?php echo Yii::$app->user->identity->username ?></b>!
    <p>This is the <?= Html::encode($this->title) ?>. Only authorized users can see it </p>

    <div class="container" id="chess">
        <div class="left">
            <h1 class="text-center" id="h1">Конь</h1>
            <div id="field"></div>
        </div>
        
<script src="frontend/js/chess.js"></script>
    </div>



<canvas id="canvas" width="288" height="512">
</canvas>

<script src="frontend/flappy/js/script.js"></script>


</div>