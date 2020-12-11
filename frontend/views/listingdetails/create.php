<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Listingdetails */

$this->title = 'Create Listingdetails';
$this->params['breadcrumbs'][] = ['label' => 'Listingdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listingdetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
