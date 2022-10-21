<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecordSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="criminal-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'record_id') ?>

    <?= $form->field($model, 'record_num') ?>

    <?= $form->field($model, 'conviction_date') ?>

    <?= $form->field($model, 'conviction_place') ?>

    <?= $form->field($model, 'curr_status') ?>

    <?php // echo $form->field($model, 'alert_flag') ?>

    <?php // echo $form->field($model, 'record_offense_id') ?>

    <?php // echo $form->field($model, 'record_conviction_id') ?>

    <?php // echo $form->field($model, 'record_person_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
