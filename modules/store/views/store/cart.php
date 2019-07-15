<?php

use yii\helpers\Html;

$this->title = 'Your cart';
$count = 0;
$cost = 0;
?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Товар</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION['cart'])) {
                if ($_SESSION['cart'] != null) {
                    foreach ($_SESSION['cart'] as $key => $goods) {
                        if ($goods != null) {
                            $cost += ($goods['count'] * $model::find()->where(['id' => $goods['id']])->one()->price);
                            echo Html::tag('tr', Html::tag('th', $count += 1) .
                                Html::tag('td', $model::find()->where(['id' => $goods['id']])->one()->name) .
                                Html::tag('th', $model::find()->where(['id' => $goods['id']])->one()->price) .
                                Html::tag('th', $goods['count']));
                        }
                    }
                }
            }
            ?>

        </tbody>
    </table>
    <hr>
    <div class="col-md-6">
    </div>
    <div class="col-md-4" style="margin:10px 0px 0px 77%;">
        <p><b>Total Cost = <?= $cost ?></b></p>
    </div>
</div>

</div class="container">