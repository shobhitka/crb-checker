<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecord $model */

$this->title = 'Update Criminal Record: ' . $model->record_id;
$this->params['breadcrumbs'][] = ['label' => 'Criminal Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->record_id, 'url' => ['view', 'record_id' => $model->record_id, 'record_offense_id' => $model->record_offense_id, 'record_conviction_id' => $model->record_conviction_id, 'record_person_id' => $model->record_person_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="criminal-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
