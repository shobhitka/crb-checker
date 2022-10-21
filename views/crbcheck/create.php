<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CrbCheck $model */

$this->title = 'Create Crb Check';
$this->params['breadcrumbs'][] = ['label' => 'Crb Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crb-check-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
