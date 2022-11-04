<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\QueryType;
use kartik\date\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\CrbCheck $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="crb-check-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <div class='col-md-3'>
        <?= $form->field($model, 'search_firstname')->textInput(['maxlength' => true]) ?>
    </div>
    <div class='col-md-3'>
        <?= $form->field($model, 'search_middlename')->textInput(['maxlength' => true]) ?>
    </div>

    <div class='col-md-3'>
    <?= $form->field($model, 'search_lastname')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <br><br>
    <div class="row">
    <div class='col-md-3'>
    
    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter start date ...'],
    'type' => DatePicker::TYPE_INPUT,
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]]) ?>

    </div>
    <div class='col-md-3'>
    <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter end date ...'],
    'type' => DatePicker::TYPE_INPUT,
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]]) ?>
    </div>
    <div class='col-md-3'>
    <?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter date of birth ...'],
    'type' => DatePicker::TYPE_INPUT,
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]]) ?>
    </div>
    </div>
    <br><br>
    <div class="row">
    <div class='col-md-3'>
    <?= $form->field($model, 'search_city')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class='col-md-3'>
    <?= $form->field($model, 'query_type_id')->dropDownList(QueryType::getQueryArrayMap()) ?>
    </div>
    </div>

    <div class="form-group">
        <br>
        <?= Html::submitButton($model->isNewRecord ? 'Save and Execute' : 'Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
