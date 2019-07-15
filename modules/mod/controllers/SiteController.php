<?php

namespace app\modules\mod\controllers;

use yii\web\Controller;
use Yii;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('publicIndex');
    }

    public function actionAbout()
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();
        } else {
            return $this->render('about');
        }
    }
}
