<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Convictions $model */

$this->title = $model->conviction_name;
$this->params['breadcrumbs'][] = ['label' => 'Convictions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="convictions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'conviction_id' => $model->conviction_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'conviction_id' => $model->conviction_id], [
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
            'conviction_id',
            'conviction_name',
            'conviction_desc',
        ],
    ]) ?>

</div>
