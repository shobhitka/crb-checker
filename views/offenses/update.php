<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Offenses $model */

$this->title = 'Update Offenses: ' . $model->offense_id;
$this->params['breadcrumbs'][] = ['label' => 'Offenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->offense_id, 'url' => ['view', 'offense_id' => $model->offense_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="offenses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
