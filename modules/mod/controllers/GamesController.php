<?php

namespace app\modules\mod\controllers;

use yii\web\Controller;
use yii;

class GamesController extends Controller
{
    public function actionList() //список игр
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'You should be authorized to see that page');
            Yii::$app->user->loginRequired();
        } else {
            return $this->render('list');
        }
    }

    public function actionLife() //игра жизнь
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();
        } else {
            return $this->render('life');
        }
    }

    public function actionChess() //ходы конём
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();
        } else {
            return $this->render('chess');
        }
    }

    public function actionFlappy() //flappy bird
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();
        } else {
            return $this->render('flappy');
        }
    }
}
