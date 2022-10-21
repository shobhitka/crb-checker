<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AddressSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'address_id') ?>

    <?= $form->field($model, 'address_start_date') ?>

    <?= $form->field($model, 'address_end_date') ?>

    <?= $form->field($model, 'address_type') ?>

    <?= $form->field($model, 'address_city') ?>

    <?php // echo $form->field($model, 'address_state') ?>

    <?php // echo $form->field($model, 'address_details') ?>

    <?php // echo $form->field($model, 'address_person_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
