<?php
namespace app\widgets;

use yii\base\Widget;
use Yii;
use app\models\SigninForm;

class SideAuth extends Widget
{
    public function run()
    {
        if (!Yii::$app->user->isGuest) {
            return;
        }
        $model = new SigninForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            # очень нежелательный вариант, который в будущем будет изменён
            Yii::$app->getResponse()->redirect('/mod')->send();
            Yii::$app->end();
        } else {
            $model->password = '';

            return $this->render('SideAuth', [
                'model' => $model,
            ]);
        }
    }
}
