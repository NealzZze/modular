<?php

use yii\helpers\Html;

$this->title = 'page with games';
?>
<div class="games-list">
    <h1>Hi!</h1>
    Greetings <b><?php echo Yii::$app->user->identity->username ?></b>!
    <p>This is the <?= Html::encode($this->title) ?>.</p>

    <div id="life">
        <hr>
        <p><b> Life the game</b>
            <a class="btn btn-success btn-sm" href="/life" role="button">go</a></p>
    </div>
    <div id="chess">
        <hr>
        <p><b> Ходы конём</b>
            <a class="btn btn-success btn-sm" href="/chess" role="button">go</a></p>
    </div>
    <div id="flappy">
        <hr>
        <p><b> Flappy bird</b>
            <a class="btn btn-success btn-sm" href="/flappy" role="button">go</a></p>
    </div>
</div>