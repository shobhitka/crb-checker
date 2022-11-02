<?php

use app\models\CriminalRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecordSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Criminal Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criminal-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Criminal Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'record_id',
            'conviction_date',
            'conviction_place',
            'curr_status',
            //'alert_flag',
            //'record_offense_id',
            //'record_conviction_id',
            //'record_person_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CriminalRecord $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'record_id' => $model->record_id, 'record_offense_id' => $model->record_offense_id, 'record_conviction_id' => $model->record_conviction_id, 'record_person_id' => $model->record_person_id]);
                 }
            ],
        ],
    ]); ?>


</div>
