<?php

use app\models\Convictions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ConvictionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Convictions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convictions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Convictions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'conviction_name',
            'conviction_desc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Convictions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'conviction_id' => $model->conviction_id]);
                 }
            ],
        ],
    ]); ?>


</div>
