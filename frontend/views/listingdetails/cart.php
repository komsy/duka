<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\StringHelper;
use frontend\models\Listingdetails;
use frontend\models\Categorydetails;
use frontend\models\ShoeImage;
use frontend\models\Cart;

$listings = Listingdetails::find()->joinWith('shoeImage')->orderBy(['listingId'=>SORT_DESC])->limit(4)->all();

$lists=Cart::find()->joinWith('listing')->all();

$totalprice=Cart::find()->joinWith('listing')->sum('price');

?>

  <div class="col d-flex justify-content-center">
    <div class="card ">
    <div class="card-body">
      <div class="row">
      <div class="col">
       <p style="text-align: center;">Product Name</p> 
      </div>
    </div>

    <div class="row">
       <?php foreach($lists as $cart) { ?>
         <div class="col-md-3 sm-3">
          <div class="card">
           <img src="<?= Yii::$app->request->baseUrl.'/'.$cart->listing0->image ?>" class="card-img-top" alt="shoes">
            <div class="card-body "> 
            <p><?=$cart->listing->shoeName?></p> 
            <p><?=$cart->listing->description?></p>
            <hr>
            <h3>Ksh <?=$cart->listing->price?></h3>
            
          </div>
        </div>
    </div>
    <br>
     <?php } ?>
    </div> <!-- / cart products -->
    
     <div class="row shadow" style="margin-top: 10px;">
        <div class="col-md-8">
          <h1>Ksh <?= $totalprice?> </h1>         
        </div>
        <div class="col-md-4">
        <a href="<?= Url::to(['listingdetails/checkout'])?>"><button type="button" class="btn btn-lg btn-primary pull-right ">Checkout</button></a>
      </div>
  </div><!-- / Products -->

    <div class="card2">
    <div class="row">
      <div class="col">
       <h1 style="text-align: center;">You may also like</h1> 
      </div>
    </div>
    </div>
   <div class="row">
    <?php foreach ($listings as $listing ) {?>
     <div class="col-md-3 sm-3">
      <div class="card">
          <img src="<?= Yii::$app->request->baseUrl.'/'.$listing->shoeImage->image ?>" class="card-img-top" alt="shoes">
          <div class="card-body ">
            <h5 class="card-title"><?=$listing->shoeName ?></h5>
            <p class="card-text"> <?=$listing->price ?>
              <br> <?=$listing->description ?></p>
            <a href="#"><button type="button" val="<?=$listing->listingId?>"class="btn btn-success addcart">Add Cart</button></a> 
           </div>
        </div>
    </div>
    <br>
     <?php } ?>
    </div>    
</div>
</div>
</div>

<?php

Modal::begin([
    'title'=>'<h4> ADD CART</h4>',
    'id'=>'addcart',
    'size'=>'model-lg',
    ]);
    echo "<div id='addcartContent'></div>";
Modal::end();

?>
