<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CrbCheck $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="crb-check-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'search_firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'search_middlename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'search_lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'search_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'search_timestamp')->textInput() ?>

    <?= $form->field($model, 'query_type_id')->textInput() ?>

    <?= $form->field($model, 'user_user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
