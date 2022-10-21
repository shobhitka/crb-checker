<?php

use app\models\CrbCheck;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CrbCheckSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Crb Checks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crb-check-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Crb Check', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'quiery_id',
            'search_firstname',
            'search_middlename',
            'search_lastname',
            'start_date',
            //'end_date',
            //'dob',
            //'search_city',
            //'search_timestamp',
            //'query_type_id',
            //'user_user_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CrbCheck $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'quiery_id' => $model->quiery_id, 'query_type_id' => $model->query_type_id, 'user_user_id' => $model->user_user_id]);
                 }
            ],
        ],
    ]); ?>


</div>
