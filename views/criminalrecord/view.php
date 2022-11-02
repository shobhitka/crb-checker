<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecord $model */

$this->title = "Record ID: " . $model->record_id;
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
            'conviction_date',
            'conviction_place',
            [
                'attribute' => 'curr_status',
                'value' => function($model) {
                    if ($model->curr_status == 1)
                        return "SERVED";
                    else if ($model->curr_status == 2)
                        return "ON BAIL";
                    else
                        return "IMPRISIONED";
                }
            ],
            [
                'attribute' => 'alert_flag',
                'value' => function($model) {
                    return $model->alert_flag == 1 ? "YES" : "NO";
                }
            ],
            [
                'attribute' => 'record_person_id',
                'label' => 'Name',
                'format' => 'raw',
                'value' => function($model) {
                    $name = $model->getCriminalName();
                    return Html::a($name, ['registry/view', 'person_id' => $model->record_person_id, 'record_id' => $model->record_id]);
                }
            ],
            [
                'attribute' => 'record_offense_id',
                'label' => 'Offense',
                'value' => function($model) {
                    return $model->getCriminalOffense();
                }
            ],
            [
                'attribute' => 'record_conviction_id',
                'label' => 'Conviction',
                'value' => function($model) {
                    return $model->getCriminalConviction();
                }
            ],
        ],
    ]) ?>

</div>
