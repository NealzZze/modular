<?php
use yii\helpers\Html;

$this->title = 'Life the game';
?>
<div class="games-life">
Greetings <b><?php echo Yii::$app->user->identity->username ?></b>!
<p>This is the <?= Html::encode($this->title) ?>.</p>
<div id="life">
<p></p>
<h1 class="text-center" id="h1">Жизнь</h1>
<canvas id="c1" width="400" height="400"></canvas>
<p>Количество циклов: <b id="count">0</b></p>
<button id="start">Начать попытку</button>
<script src="frontend/games/life/script.js"></script>
</div>
</div>