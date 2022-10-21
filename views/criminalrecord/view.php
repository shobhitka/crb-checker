<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecord $model */

$this->title = $model->record_id;
$this->params['breadcrumbs'][] = ['label' => 'Criminal Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="criminal-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'record_id' => $model->record_id, 'record_offense_id' => $model->record_offense_id, 'record_conviction_id' => $model->record_conviction_id, 'record_person_id' => $model->record_person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'record_id' => $model->record_id, 'record_offense_id' => $model->record_offense_id, 'record_conviction_id' => $model->record_conviction_id, 'record_person_id' => $model->record_person_id], [
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
            'record_id',
            'record_num',
            'conviction_date',
            'conviction_place',
            'curr_status',
            'alert_flag',
            'record_offense_id',
            'record_conviction_id',
            'record_person_id',
        ],
    ]) ?>

</div>
