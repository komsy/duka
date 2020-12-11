<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\ShoeImage;
use frontend\models\Listingdetails;
use frontend\models\Cart;

/* @var $this yii\web\View */
/* @var $model frontend\models\Checkout */


$totalprice=Cart::find()->joinWith('listing')->sum('price');
$lists=Cart::find()->joinWith('listing')->all();

?>
<h1 style="margin-bottom: 0px;">Invoice</h1>
<div class="checkout-view" style="margin-top: 5px">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email:email',
            'phoneNo',
            'location',
        ],
    ]) ?>

    Total amount paid: Ksh <?= $totalprice?> 
    
    
    <div class="row" style="height: 50px;, margin-top: 50px;">
    	<div class="col">
       <?php foreach($lists as $cart) { ?>
        
           <img src="<?= Yii::$app->request->baseUrl.'/'.$cart->listing0->image ?>" class="card-img-top" style="width:100px; " alt="shoes">
            
           <?=$cart->listing->shoeName?>
            <?=$cart->listing->description?>
            Ksh <?=$cart->listing->price?>
              <hr>
    <br>
     <?php } ?>
    </div> <!-- / cart products -->
     </div>
 
</div>
