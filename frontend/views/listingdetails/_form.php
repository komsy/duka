<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Categorydetails;


/* @var $this yii\web\View */
/* @var $model frontend\models\Listingdetails */
/* @var $form yii\bootstrap4\ActiveForm */

$categorylist = ArrayHelper::map(categorydetails::find()->all(), 'categoryId', 'category'); //map all data in categorytable and select category id and category name

?>

<div class="listingdetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cartegoryId')->textInput()->dropDownList($categorylist, ['placeholder'=>'Select Shoe Category']) ?>

    <?= $form->field($model, 'shoeName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>


    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
