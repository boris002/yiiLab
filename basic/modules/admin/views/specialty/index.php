<?php

use app\modules\admin\models\specialty;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\specialtySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'СПЕЦИАЛЬНОСТИ';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = $this->title;?>

<div class="specialty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= Html::a('Визиты', Url::to(['/admin/appointments/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Доктора', Url::to(['/admin/doctors/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Диагнозы', Url::to(['/admin/diagnoses/index']), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Пациенты', Url::to(['/admin/patients/index']), ['class' => 'btn btn-primary']) ?>

    </div>
<br>
    <p>
        <?= Html::a('Добавить специальность', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'label' => 'Название',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, specialty $model, $key, $index, $column) {
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
