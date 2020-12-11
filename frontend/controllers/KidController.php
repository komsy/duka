<?php

namespace frontend\controllers;
use Yii;

class KidController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    //Function to add cart
    public function actionAddcart($listingId)
    {
        $model = new \frontend\models\Cart();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['site/index']);
        }

        return $this->renderAjax('addcart', [
            'model' => $model,
            'listingId' => $listingId,
        ]);
    }

}
