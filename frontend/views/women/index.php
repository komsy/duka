<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\StringHelper;
use frontend\models\Listingdetails;
use frontend\models\Categorydetails;
use frontend\models\ShoeImage;

$this->title = 'Women Index';

$listings = Listingdetails::find()->orderBy(['listingId'=>SORT_DESC])->where(['cartegoryId' =>12])->joinWith('shoeImage')->all();

?>
		
		<!--background image -->
		<div class="hero-image hero-img2 justify-content-center"></div>
		  <div class="hero-text access" style="margin-left: 20px;">
		    <h1 style="font-size:50px">Women Shoes</h1>
		    <a href="#" class="btn btn-dark">Shop</a>
		</div><!-- /background image -->

	<div class="all" style="margin-left: 20px; ">
		<div class="row">
		<?php foreach ($listings as $listing ) {?>
    
		<div class="col-md-3 sm-3">
			<div class="card">
	        <img src="<?= Yii::$app->request->baseUrl.'/'.$listing->shoeImage->image ?>" class="card-img-top" alt="shoes">
	        <div class="card-body ">
	          <h5 class="card-title"><?=$listing->shoeName ?></h5>
	          <p class="card-text">Ksh. <?=$listing->price ?>
	            <br> <?=$listing->description ?></p>
				 <a href="#"><button type="button" val="<?=$listing->listingId?>"class="btn btn-success addcart">Add Cart</button></a> 
	        </div>
	      </div>
		</div>
		<br>
		 <?php } ?>
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