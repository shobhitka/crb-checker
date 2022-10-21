<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Registry $model */

$this->title = 'Update Registry: ' . $model->person_id;
$this->params['breadcrumbs'][] = ['label' => 'Registries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_id, 'url' => ['view', 'person_id' => $model->person_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
