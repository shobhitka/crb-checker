<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Convictions $model */

$this->title = 'Create Convictions';
$this->params['breadcrumbs'][] = ['label' => 'Convictions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convictions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
