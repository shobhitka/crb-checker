<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CrbCheck $model */

$this->title = 'Update Crb Check: ' . $model->quiery_id;
$this->params['breadcrumbs'][] = ['label' => 'Crb Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quiery_id, 'url' => ['view', 'quiery_id' => $model->quiery_id, 'query_type_id' => $model->query_type_id, 'user_user_id' => $model->user_user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="crb-check-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
