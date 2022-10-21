<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Convictions $model */

$this->title = 'Update Convictions: ' . $model->conviction_id;
$this->params['breadcrumbs'][] = ['label' => 'Convictions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->conviction_id, 'url' => ['view', 'conviction_id' => $model->conviction_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="convictions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
