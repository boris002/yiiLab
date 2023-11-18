<?php

use app\models\Basket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\BasketSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = $this->title;?>

<div class="basket-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'source_table',
                'label' => 'Таблица',
            ],
            [
                'attribute' => 'record_data',
                'label' => 'Логи',
            ],
            [
                'attribute' => 'deleted_at',
                'label' => 'Время удаления',
            ],

           // [
             //   'class' => ActionColumn::className(),
               // 'urlCreator' => function ($action, Basket $model, $key, $index, $column) {
                 //   return Url::toRoute([$action, 'id' => $model->id]);
                // }
            //],
        ],
        'pager' => [
            'class' => LinkPager::class,
        ],
    ]);


    LinkPager::widget(['pagination' => $dataProvider->pagination]);
    ?>

</div>
