<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Offenses $model */

$this->title = $model->offense_name;
$this->params['breadcrumbs'][] = ['label' => 'Offenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="offenses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'offense_id' => $model->offense_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'offense_id' => $model->offense_id], [
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
            'offense_id',
            'offense_name',
            'offense_desc',
        ],
    ]) ?>

</div>
