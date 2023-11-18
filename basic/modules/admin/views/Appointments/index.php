<?php

use app\modules\admin\models\Appointments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;


/** @var yii\web\View $this */
/** @var app\modules\admin\models\AppointmentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'ВИЗИТЫ';


$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = $this->title;?>

<div class="appointments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= Html::a('Доктора', Url::to(['/admin/doctors/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Диагнозы', Url::to(['/admin/diagnoses/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Специальности', Url::to(['/admin/specialty/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Пациенты', Url::to(['/admin/patients/index']), ['class' => 'btn btn-primary']) ?>

    </div>
    <br>

    <p>
        <?= Html::a('Добавить визит', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
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
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Appointments $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            },
        ],
    ],
    'pager' => [
        'class' => LinkPager::class,
    ],
]);


LinkPager::widget(['pagination' => $dataProvider->pagination]);
?>

    </div>
