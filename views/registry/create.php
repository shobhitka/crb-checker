<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Registry $model */

$this->title = 'Create Registry';
$this->params['breadcrumbs'][] = ['label' => 'Registries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
