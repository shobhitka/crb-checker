<?php

use yii\helpers\Html;
use app\models\Registry;

/** @var yii\web\View $this */
/** @var app\models\CriminalRecord $model */
$person = Registry::find()->where(['=', 'person_id', $person_id])->one();
$name = $person->fisrt_name . " " . $person->last_name;

$this->title = 'Add Criminal Record for ';
$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['registry/view?person_id='.$person_id.'&record_id=']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criminal-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'person_id' => $person_id,
    ]) ?>

</div>
