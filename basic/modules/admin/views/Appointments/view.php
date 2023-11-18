<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Appointments $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Визиты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="appointments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_doctor',
                'value' => function ($model) {
                    return $model->doctor->name;
                },
                'label' => 'Доктор',
            ],
            [
                'attribute' => 'id_patient',
                'value' => function ($model) {
                    return $model->patient->name;
                },
                'label'=>'Пациент',
            ],
            [
                'attribute' => 'visit_date',
                'label' => 'Дата',
            ],
            [
                'attribute' => 'visit_purpose',
                'label' => 'Цель визита',
            ],
            [
                'attribute' => 'visit_price',
                'label' => 'Стоимость',
            ],
            [
                'attribute' => 'id_diagnose',
                'value' => function ($model) {
                    return $model->diagnose->name;
                },
                'label'=>'Дигноз',

            ],
            ]
    ]) ?>

</div>
