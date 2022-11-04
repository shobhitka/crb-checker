<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Address;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Registry $model */

$this->title = $name = $model->fisrt_name . " " . $model->last_name;
if (isset($record_id)) {
    $this->params['breadcrumbs'][] = ['label' => 'Criminal Record - '.$record_id, 'url' => ['criminalrecord/view?record_id='.$record_id]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Registries', 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->identity->isAdmin())
    $template = '{view} {update} {delete}';
else
    $template = '{view}';

\yii\web\YiiAsset::register($this);
?>
<div class="registry-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->identity->isAdmin()) { ?>
        <?= Html::a('Update', ['update', 'person_id' => $model->person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'person_id' => $model->person_id], [
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
            'person_id',
            'email:email',
            'fisrt_name',
            'middle_name',
            'last_name',
            'dob',
            'phone',
        ],
    ]) ?>

    <br>
    <h2> Known Addresses</h2>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => "Address",
                'value' => function ($model) {
                    return $model->address_details . ", " . $model->address_city . ", " . $model->address_state;
                }
            ],
            [
                'attribute' => 'address_type',
                'label' => "Type",
                'value' => function ($model) {
                    return $model->address_type == 1 ? "PERMANENT" : "TEMPORARY";
                }
            ],
            'address_start_date',
            'address_end_date',
            [
                'class' => ActionColumn::className(),
                'template' => $template,
                'urlCreator' => function ($action, Address $model, $key, $index, $column) {
                    return Url::toRoute(["/address/view", 'address_id' => $model->address_id, 'address_person_id' => $model->address_person_id]);
                 }
            ],
        ],
    ]); ?>

    <?php if (Yii::$app->user->identity->isAdmin()) { ?>
    <?= Html::a('Add New Address', ['address/create', 'address_person_id' => $model->person_id], ['class' => 'btn btn-primary']) ?>
    <?php } ?>

    <br><br>
    <h2> Criminal Records</h2>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'record_person_id',
                'label' => 'Name',
                'value' => function($model) {
                    return $model->getCriminalName();
                }
            ],
            [
                'attribute' => 'record_offense_id',
                'label' => 'Offense',
                'value' => function($model) {
                    return $model->getCriminalOffense();
                }
            ],
            [
                'attribute' => 'record_conviction_id',
                'label' => 'Conviction',
                'value' => function($model) {
                    return $model->getCriminalConviction();
                }
            ],
            'conviction_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'record_id' => $model->record_id, 'record_offense_id' => $model->record_offense_id, 'record_conviction_id' => $model->record_conviction_id, 'record_person_id' => $model->record_person_id]);
                 }
            ],
        ],
    ]); ?>

    <?php if (Yii::$app->user->identity->isAdmin()) { ?>
    <?= Html::a('Add New Record', ['criminalrecord/createnew', 'address_person_id' => $model->person_id], ['class' => 'btn btn-primary']) ?>
    <?php } ?>
</div>
