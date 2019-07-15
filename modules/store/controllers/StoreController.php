<?php

namespace app\modules\store\controllers;

use Yii;
use app\models\Store_Items;
use app\models\Store_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use phpDocumentor\Reflection\Types\Null_;

/**
 * StoreController implements the CRUD actions for Store_Items model.
 */
class StoreController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [],
            ],
        ];
    }

    public function actionCart()
    {
        $model = new Store_Items();
        return $this->render('cart', ['model' => $model]);
    }

    /**
     * Lists all Store_Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Store_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Store_Items model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $rcount = false;

        if (isset($_SESSION['cart'])) {
            if ($_SESSION['cart'] != null) {
                foreach ($_SESSION['cart'] as $key => $pgoods) {
                    if ($pgoods['id'] == $id) {
                        $rkey = $key;
                        $rcount = true;
                        break;
                    }
                }
                if ($rcount == true) {
                    ($_SESSION['cart'][$rkey]['count']++);
                } else {
                    $_SESSION['cart'][] = array('id' => $id, 'count' => 1);
                }
            } else {
                $_SESSION['cart'][] = array('id' => $id, 'count' => 1);
            }
        } else {
            $_SESSION['cart'][] = array('id' => $id, 'count' => 1);
        }

        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $rcount = false;

        if (isset($_SESSION['cart'])) {
            if ($_SESSION['cart'] != null) {
                foreach ($_SESSION['cart'] as $key => $pgoods) {
                    if ($pgoods['id'] == $id) {
                        $rkey = $key;
                        $rcount = true;
                        break;
                    }
                }
                if ($rcount == true) {
                    if ($_SESSION['cart'][$rkey]['count'] > 1) {
                        ($_SESSION['cart'][$rkey]['count']--);
                    } else {
                        $this->actionDelete($id);
                    }
                }
            }
        }

        return $this->redirect(['index']);
    }


    /**
     * Creates a new Store_Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Store_Items();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        foreach ($_SESSION['cart'] as $key => $pgoods) {
            if ($pgoods['id'] == $id) {
                unset($_SESSION['cart'][$key]);
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Store_Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Store_Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Store_Items::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
