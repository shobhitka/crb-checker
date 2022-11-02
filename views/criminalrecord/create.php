<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecord $model */

$this->title = 'Create Criminal Record';
$this->params['breadcrumbs'][] = ['label' => 'Criminal Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criminal-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'registry' => $registry,
        'address' => $address
    ]) ?>

</div>
