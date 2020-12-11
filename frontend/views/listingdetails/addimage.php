<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoeImage */
/* @var $form ActiveForm */
?>
<div class="addImage">
<h1><?= Html::encode($this->title) ?></h1>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="upload-icon">
            <i class="fas fa-upload"></i>
        </div>
          
    <?php $form = ActiveForm::begin(['id' => 'image-create'],['options' => ['enctype' => 'multipart/form-data'] ]); ?>

        <?= $form->field($model, 'listingId')->hiddenInput(['value' => $listingId])->label(false) ?>
        <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addImage -->
