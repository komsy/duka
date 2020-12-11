<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use frontend\models\Listingdetails;
use common\models\User;
use frontend\models\ShoeImage;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cart */
/* @var $form ActiveForm */
$listing = ArrayHelper::map(Listingdetails::find()->all(), 'listingId', 'price');
$userId = user::find()->where(['id'=>Yii::$app->user->id])->one();
?>
<div class="addcart">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'listingId')->hiddenInput(['value' => $listingId, 'readonly'=>true])->label(false)  ?>
        <?= $form->field($model, 'userId')->hiddenInput(['value' => $userId->id, 'readonly'=>true])->label(false) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
 <?php                 

        Modal::begin([

                'header' => 'your-header',

                'id' => 'your-modal',

                'size' => 'modal-md',

            ]);

        echo "<div id='modalContent'></div>";

        Modal::end();

    ?>
</div><!-- addcart -->

