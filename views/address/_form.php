<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Address $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address_start_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter start date ...'],
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]) ?>
    <br>

    <?= $form->field($model, 'address_end_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter end date ...'],
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]) ?>
    <br>
    <?= $form->field($model, 'address_type')->dropDownList(['1' => 'PERMANENT',
															 '2' => 'TEMPORARY']) ?>
    <br>
    <?= $form->field($model, 'address_city')->textInput(['maxlength' => true]) ?>
    <br>
    <?= $form->field($model, 'address_state')->textInput(['maxlength' => true]) ?>
    <br>
    <?= $form->field($model, 'address_details')->textInput(['maxlength' => true]) ?>
    <br>

    <?= $form->field($model, 'address_person_id')->hiddenInput(['value'=>$address_person_id])->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
