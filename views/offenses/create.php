<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Offenses $model */

$this->title = 'Create Offenses';
$this->params['breadcrumbs'][] = ['label' => 'Offenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offenses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
