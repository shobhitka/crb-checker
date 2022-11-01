<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Convictions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="convictions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'conviction_type')->textInput() ?>

    <?= $form->field($model, 'conviction_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conviction_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
