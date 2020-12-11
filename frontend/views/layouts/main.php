<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark sticky-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Women', 'url' => ['/women/index']],
        ['label' => 'Men', 'url' => ['/men/index']],
        ['label' => 'Kids', 'url' => ['/kid/index']],
        ['label' => 'accessory', 'url' => ['/accessory/index']],
        [
            'label' => 'Account Add',
            'items' => [
                 ['label' => 'Add List', 'url' => ['/listingdetails/index']],
                 '<div class="dropdown-divider"></div>',
                 ['label' => 'Add Cart', 'url' => ['/listingdetails/cart']],
            ],
      ], 
      
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
       $menuItems[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')',
            'url'=>['site/logout'],
            'linkOptions'=>[
                'data-method'=>'post'
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto '],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</div>

<!-- Footer-->
    <div class="foot" >
    <footer class="page-footer font-small blue pt-4" >
        <div class="container-fluid text-center text-md-left">
            <div class="row">
            <div class="col-md-8  ">
                <div class="row" >
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>My Account</h4>
                        <h6>Sign in </h6>
                        <h6>Register</h6>
                        <h6>Order Status</h6>
                    </div>
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>Help</h4>
                        <h6>Shipping </h6>
                        <h6>Returns</h6>
                        <h6>Order Delivery</h6>
                    </div>
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>About</h4>
                        <h6>Our Story </h6>
                        <h6>Sustainability</h6>
                        <h6>Contact Us</h6>
                    </div>
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>Legal Staff</h4>
                        <h6>Terms of Use </h6>
                        <h6>Terms of Sale</h6>
                        <h6>Privacy Policy</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 " style="margin-top: 10px;">
                <h3>Social Media pages</h3>
                 <!-- Add font awesome icons -->
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
        </div>
        </div>
    </footer>
        <!-- / Footer-->
    <div class="footer" style="text-align: center;">
    <p>&copy;&nbsp;Copyright.All rights reserved 2020. </p>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
