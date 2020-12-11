<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Listingdetails;
use frontend\models\Cart;

/* @var $this yii\web\View */
/* @var $model frontend\models\Checkout */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Checkouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$totalprice=Cart::find()->joinWith('listing')->sum('price');

?>
<div class="checkout-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->checkoutId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->checkoutId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Generate Pdf', ['gen-pdf', 'id' => $model->checkoutId], ['class' => 'btn btn-success']) ?>
    </p>

   <div class="row justify-content-center" style="margin-bottom: 10%">
      <div class="col-sm-6 text-center">
        <h1><strong> Thank you for your Purchase!</strong></h1>
        <br>
        <h6 class="product-price"><span> Your Order of Ksh <?=$totalprice?> has been Confirmed</span></h6>
        <br>
        <p class="font-italic">We'd love to hear from you. <br>Please follow us on our social media pages or send us an email to duka@help.com to let us know how was your experience with us.</p>
      </div>

</div>
