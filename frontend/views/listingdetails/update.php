<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Listingdetails */

$this->title = 'Update Listingdetails: ' . $model->listingId;
$this->params['breadcrumbs'][] = ['label' => 'Listingdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->listingId, 'url' => ['view', 'id' => $model->listingId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="listingdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
