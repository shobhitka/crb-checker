<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Address $model */

$this->title = $model->address_id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'address_id' => $model->address_id, 'address_person_id' => $model->address_person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'address_id' => $model->address_id, 'address_person_id' => $model->address_person_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'address_id',
            'address_start_date',
            'address_end_date',
            'address_type',
            'address_city',
            'address_state',
            'address_details',
            'address_person_id',
        ],
    ]) ?>

</div>
