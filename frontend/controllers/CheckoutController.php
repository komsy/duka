<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Checkout;
use frontend\models\CheckoutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * CheckoutController implements the CRUD actions for Checkout model.
 */
class CheckoutController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Checkout models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CheckoutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Checkout model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGenPdf($id)
    {
        $pdf_content= $this->renderPartial('view-pdf', [
            'model' => $this->findModel($id),
        ]);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($pdf_content);
        $mpdf->Output();
        exit;
    }

    /**
     * Creates a new Checkout model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Checkout();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            \Yii::$app->mailer->compose([

            ])
                ->setFrom(\Yii::$app->params['senderEmail'])
                ->setTo('koometest@gmail.com')
                ->setSubject('You order has been confirmed')
                ->send();
               // Yii::$app->session->setFlash('success', 'Thank you for your purchase');

            return $this->redirect(['view', 'id' => $model->checkoutId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Checkout model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->checkoutId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Checkout model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Checkout model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Checkout the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Checkout::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
