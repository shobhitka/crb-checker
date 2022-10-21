<?php

use app\models\QueryType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\QueryTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Query Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="query-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Query Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type_id',
            'type_name',
            'type_desc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, QueryType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'type_id' => $model->type_id]);
                 }
            ],
        ],
    ]); ?>


</div>
