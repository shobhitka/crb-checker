<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OffensesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="offenses-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'offense_id') ?>

    <?= $form->field($model, 'offense_name') ?>

    <?= $form->field($model, 'offense_type') ?>

    <?= $form->field($model, 'offense_desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
