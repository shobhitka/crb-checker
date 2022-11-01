<?php

use app\models\Offenses;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OffensesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Offenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offenses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Offenses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'offense_name',
            'offense_desc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Offenses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'offense_id' => $model->offense_id]);
                 }
            ],
        ],
    ]); ?>


</div>
