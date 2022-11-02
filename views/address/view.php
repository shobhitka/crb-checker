<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Registry;

/** @var yii\web\View $this */
/** @var app\models\Address $model */

$this->title = $model->address_id;
$person = Registry::find()->where(["=", 'person_id', $model->address_person_id])->one();
$name = $person->fisrt_name . " " . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['registry/view?person_id='.$model->address_person_id."&record_id=''"]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->identity->isAdmin()) { ?>
        <?= Html::a('Update', ['update', 'address_id' => $model->address_id, 'address_person_id' => $model->address_person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'address_id' => $model->address_id, 'address_person_id' => $model->address_person_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'address_id',
            'address_start_date',
            'address_end_date',
            [
                'attribute' => 'address_type',
                'value' => function ($model) {
                    return $model->address_type == 1 ? "PERMENANT" : "TEMPORARY";
                }
            ],
            'address_city',
            'address_state',
            'address_details',
        ],
    ]) ?>

</div>
