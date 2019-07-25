<?php

use yii\helpers\Html;

$this->title = 'Knight chess';
?>
<div class="games-chess">
Greetings <b><?php echo Yii::$app->user->identity->username ?></b>!
<p>This is the <?= Html::encode($this->title) ?>.</p>
</div>
<div class="container" id="chess">
<div class="left">
<h1 class="text-center" id="h1">Конь</h1>
<div id="field"></div>
</div>
<script src="frontend/games/chess/js/script.js"></script>
</div>