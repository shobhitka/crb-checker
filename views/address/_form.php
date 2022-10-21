<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Address $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address_start_date')->textInput() ?>

    <?= $form->field($model, 'address_end_date')->textInput() ?>

    <?= $form->field($model, 'address_type')->textInput() ?>

    <?= $form->field($model, 'address_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_person_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
