<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Convictions;
use app\models\Offenses;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="criminal-record-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <br><br>
    <h2>Person Details</h2>
    <div class="row">
        <div class='col-md-3'>    
            <?= $form->field($registry, 'fisrt_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($registry, 'middle_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-3'>
        <?= $form->field($registry, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class='col-md-3'>
            <?= $form->field($registry, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($registry, 'dob')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter date of birth ...'],
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($registry, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <br>

    <h2>Address Details</h2>
    <div class="row">
        <div class='col-md-3'>
            <?= $form->field($address, 'address_type')->dropDownList(['1' => 'PERMANENT',
															 '2' => 'TEMPORARY']) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($address, 'address_details')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($address, 'address_city')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class='col-md-3'>
            <?= $form->field($address, 'address_state')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-3'>
        <?= $form->field($address, 'address_start_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter start date ...'],
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]) ?>

        </div>
        <div class='col-md-3'>
        <?= $form->field($address, 'address_end_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter end date ...'],
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]) ?>
        </div>
    </div>
    <br>

    <h2>Conviction Details</h2>
    <div class="row">
        <div class='col-md-3'>
            <?= $form->field($model, 'conviction_date')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Enter conviction date ...'],
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]) ?>
        </div>
        <div class='col-md-3'>
            <?= $form->field($model, 'conviction_place')->textInput(['maxlength' => true]) ?>    
        </div>
        <div class='col-md-3'>
            <?= $form->field($model, 'curr_status')->dropDownList(['1' => 'SERVED',
															 '2' => 'ON BAIL',
                                                             '3' => 'IMPRISIONED']) ?> 
        </div>
    </div>
    <br>
    <div class="row">
        <div class='col-md-3'>
            <?= $form->field($model, 'alert_flag')->dropDownList(['1' => 'YES',
															 '2' => 'NO']) ?> 
        </div>
        <div class='col-md-3'>
            <?= $form->field($model, 'record_offense_id')->dropDownList(Offenses::getOffensesArrayMap())->label("Offense") ?>
        </div>    
        <div class='col-md-3'>
            <?= $form->field($model, 'record_conviction_id')->dropDownList(Convictions::getConvictionsArrayMap())->label("Conviction") ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
