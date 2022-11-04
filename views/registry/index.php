<?php

use app\models\Registry;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RegistrySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Registry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => "Person Name",
                'value' => function($model) {
                    return $model->fisrt_name . " " . "$model->last_name";
                }
            ],
            'email:email',
            'dob',
            'phone',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Registry $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'person_id' => $model->person_id, 'record_id'=>'']);
                 }
            ],
        ],
    ]); ?>


</div>
