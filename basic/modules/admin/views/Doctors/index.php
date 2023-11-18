<?php

use app\modules\admin\models\Doctors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\DoctorsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'ДОКТОРА';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = $this->title;?>

<div class="doctors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= Html::a('Визиты', Url::to(['/admin/appointments/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Диагнозы', Url::to(['/admin/diagnoses/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Специальности', Url::to(['/admin/specialty/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Пациенты', Url::to(['/admin/patients/index']), ['class' => 'btn btn-primary']) ?>

    </div>
    <br>

    <p>
        <?= Html::a('Добавить доктора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'label' => 'ФИО',
            ],
            [
                'attribute' => 'id_specialty',
                'value' => function ($model) {
                    return $model->specialty->name; // Используйте функцию замыкания для получения имени доктора
                },
                'label'=>'Специальность'
            ],
            [
                'attribute' => 'category',
                'label' => 'Категория',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Doctors $model, $key, $index, $column) {
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
