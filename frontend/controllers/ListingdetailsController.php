<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Listingdetails;
use frontend\models\ShoeImage;
use frontend\models\ListingdetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ListingdetailsController implements the CRUD actions for Listingdetails model.
 */
class ListingdetailsController extends Controller
{
   public $enableCsrfValidation = false;
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
     * Lists all Listingdetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListingdetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Listingdetails model.
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

    /**
     * Creates a new Listingdetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Listingdetails();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([ 'addimage','id' => $model->listingId]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    //function to add image to the db and file path
    public function actionAddimage($id)
    {
    $model = new ShoeImage();
    if ($model->load(Yii::$app->request->post()))
    {
        //generates images with unique names
        $imageName = bin2hex(openssl_random_pseudo_bytes(10));
        $model->image = UploadedFile::getInstance($model, 'image');
        //saves file in the root directory
         $model->image->saveAs('uploads/'.$imageName.'.'.$model->image->extension);
            //save in the db
         $model->image ='uploads/'.$imageName.'.'.$model->image->extension;
         $model->save();
         return $this->redirect(['index']);
        }
    return $this->render('addimage', [
        'model' => $model,
        'listingId' => $id,
    ]);
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
    
  public function actionCart()
  {
  return $this->render('cart');
}

public function actionCheckout()
  {
  return $this->render('checkout');
}

public function actionAck($user)
  {
    
    return $this->render('ack',[
    'user'=>$user, ]);
}


public function actionAcknowledgment($id)
{
    $model = new \frontend\models\Acknowledgement();

    if ($model->load(Yii::$app->request->post())) {
        $model->save();
        return $this->redirect(['site/index']);
    }

    return $this->render('acknowledgment', [
        'model' => $model,
        'listingId' => $id,
    ]);
}

    public function actionSubscribe($username)
    {
        $channel =$this->findchannel ($username);

        $userId= \Yii::$app->user->id;
        $subscriber= $channel->isSubscribed($userId);
        if (!$subscriber) {

            $subscriber =new Subscriber();
            $subscriber->channel_id= $channel->id;
            $subscriber->user_id= $userId;
            $subscriber->created_at =time();
            $subscriber->save();
            \Yii::$app->mailer->compose([
                'html'=>'subscriber-html', 'text'=> 'subscriber-text'], [
                    'channel'=> $channel,
                    'user'=> \Yii::$app->user->identity
                ])
            ->setFrom(\Yii::$app->params['senderEmail'])
            ->setTo($channel->email)
            ->setSubject('You have new subscriber')
            ->send();

        } else {
            $subscriber ->delete();
        }

        return $this->renderAjax('_subscribe', [
            'channel'=> $channel
        ]);

        
    }

    /**
 * THE CONTROLLER ACTION

use kartik\mpdf\Pdf;
 
// Privacy statement output demo
public function actionViewPrivacy() {
    Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
        'destination' => Pdf::DEST_BROWSER,
        'content' => $this->renderPartial('privacy'),
        'options' => [
            // any mpdf options you wish to set
        ],
        'methods' => [
            'SetTitle' => 'Privacy Policy - Krajee.com',
            'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
            'SetHeader' => ['Krajee Privacy Policy||Generated On: ' . date("r")],
            'SetFooter' => ['|Page {PAGENO}|'],
            'SetAuthor' => 'Kartik Visweswaran',
            'SetCreator' => 'Kartik Visweswaran',
            'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
        ]
    ]);
    return $pdf->render();
} */
    /**
     * Updates an existing Listingdetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->listingId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Listingdetails model.
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
     * Finds the Listingdetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Listingdetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Listingdetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
