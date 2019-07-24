<?php

namespace app\modules\mod\controllers;

use yii\web\Controller;

class GamesController extends Controller
{
    public function actionList()//список игр
    {
        return $this->render('list');
    }

    public function actionLife()//игра жизнь
    {
        return $this->render('life');
    }

    public function actionChess()//ходы конём
    {
        return $this->render('chess');
    }

    public function actionFlappy()//flappy bird
    {
        return $this->render('flappy');
    }
}
