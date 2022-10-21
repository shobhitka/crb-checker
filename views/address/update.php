<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Address $model */

$this->title = 'Update Address: ' . $model->address_id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->address_id, 'url' => ['view', 'address_id' => $model->address_id, 'address_person_id' => $model->address_person_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
