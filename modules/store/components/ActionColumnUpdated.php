<?php

namespace app\modules\store\components;

use yii\grid\ActionColumn;
use yii;
use yii\helpers\Html;

class ActionColumnUpdated extends ActionColumn
{
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'add_shopping_cart');
        $this->initDefaultButton('delete', 'remove_shopping_cart');
        $this->initDefaultButton('update', 'exposure_neg_1');
    }

    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
            switch ($name) {
                case 'view':
                    $title = Yii::t('yii', 'Add');
                    break;

                case 'delete':
                    $title = Yii::t('yii', 'Remove');
                    break;

                case 'update':
                    $title = Yii::t('yii', '-1');
                    break;

                default:
                    $title = ucfirst($name);
            }
            $options = array_merge([
                'title' => $title,
                'aria-label' => $title,
                'data-pjax' => '0',
            ], $additionalOptions, $this->buttonOptions);
            $icon = Html::tag('i', "$iconName", ['class' => "material-icons"]);
            return Html::a($icon, $url, $options);
        };
    }
}
