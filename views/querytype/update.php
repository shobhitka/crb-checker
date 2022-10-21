<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\QueryType $model */

$this->title = 'Update Query Type: ' . $model->type_id;
$this->params['breadcrumbs'][] = ['label' => 'Query Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_id, 'url' => ['view', 'type_id' => $model->type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="query-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
