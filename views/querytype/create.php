<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\QueryType $model */

$this->title = 'Create Query Type';
$this->params['breadcrumbs'][] = ['label' => 'Query Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="query-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
