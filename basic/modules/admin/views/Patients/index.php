<?php

use app\modules\admin\models\Patients;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\PatientsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'ПАЦИЕНТЫ';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = $this->title;?>

<div class="patients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= Html::a('Визиты', Url::to(['/admin/appointments/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Доктора', Url::to(['/admin/doctors/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Диагнозы', Url::to(['/admin/diagnoses/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Специальности', Url::to(['/admin/specialty/index']), ['class' => 'btn btn-primary']) ?>
    </div>


    <p>
        <?= Html::a('Добавить пациента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'medical_card_number',
                'label' => 'Номер мед карты',
            ],
            [
                'attribute' => 'name',
                'label' => 'ФИО',
            ],
            [
                'attribute' => 'date_of_birth',
                'label' => 'Дата рождения',
            ],
            [
                'attribute' => 'address',
                'label' => 'Адрес',
            ],
            [
                'attribute' => 'gender',
                'label' => 'Пол',
            ],
            [
                'attribute' => 'discount',
                'label' => 'Скидка',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Patients $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
        'pager' => [
            'class' => LinkPager::class,
        ],
    ]);
    LinkPager::widget(['pagination' => $dataProvider->pagination]);
    ?>



</div>
