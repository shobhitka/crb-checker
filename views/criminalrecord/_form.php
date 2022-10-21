<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="criminal-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'record_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conviction_date')->textInput() ?>

    <?= $form->field($model, 'conviction_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'curr_status')->textInput() ?>

    <?= $form->field($model, 'alert_flag')->textInput() ?>

    <?= $form->field($model, 'record_offense_id')->textInput() ?>

    <?= $form->field($model, 'record_conviction_id')->textInput() ?>

    <?= $form->field($model, 'record_person_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
