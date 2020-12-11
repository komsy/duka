<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ListingdetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="listingdetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'listingId') ?>

    <?= $form->field($model, 'cartegoryId') ?>

    <?= $form->field($model, 'shoeName') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
