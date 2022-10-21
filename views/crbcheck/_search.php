<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CrbCheckSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="crb-check-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quiery_id') ?>

    <?= $form->field($model, 'search_firstname') ?>

    <?= $form->field($model, 'search_middlename') ?>

    <?= $form->field($model, 'search_lastname') ?>

    <?= $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'search_city') ?>

    <?php // echo $form->field($model, 'search_timestamp') ?>

    <?php // echo $form->field($model, 'query_type_id') ?>

    <?php // echo $form->field($model, 'user_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
