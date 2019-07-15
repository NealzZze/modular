<?php

namespace app\modules\store;

/**
 * store module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        \Yii::configure(
            $this,
            require __DIR__ . "/config/main.php"
        );
    }
}
