<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Offenses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="offenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'offense_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offense_type')->textInput() ?>

    <?= $form->field($model, 'offense_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
