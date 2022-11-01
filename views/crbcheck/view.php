<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\QueryType;

/** @var yii\web\View $this */
/** @var app\models\CrbCheck $model */

$this->title = $model->quiery_id;
$this->params['breadcrumbs'][] = ['label' => 'Crb Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="crb-check-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'quiery_id' => $model->quiery_id, 'query_type_id' => $model->query_type_id, 'user_user_id' => $model->user_user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'quiery_id' => $model->quiery_id, 'query_type_id' => $model->query_type_id, 'user_user_id' => $model->user_user_id], [
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
            'quiery_id',
            'search_firstname',
            'search_middlename',
            'search_lastname',
            'start_date',
            'end_date',
            'dob',
            'search_city',
            'search_timestamp',
            [
                'label' => 'Query Type',
                'value' => QueryType::getQueryName($model->query_type_id),
            ],
        ],
    ]) ?>

</div>
