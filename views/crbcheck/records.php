<?php

use app\models\CrbCheck;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CrbCheckSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Criminal Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crb-check-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'record_person_id',
                'label' => 'Name',
                'value' => function($model) {
                    return $model->getCriminalName();
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
            [
                'attribute' => 'curr_status',
                'value' => function ($model) {
                    if ($model->curr_status == 1)
                        return "SERVED";
                    else if ($model->curr_status == 2)
                        return "ON BAIL";
                    else
                        return "IMPRISIONED";
                }
            ],
            'conviction_date',
            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>


</div>
