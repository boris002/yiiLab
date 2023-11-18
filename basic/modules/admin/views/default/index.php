<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
?>
<h1>Админка</h1>

<div>
    <?= Html::a('Визиты', Url::to(['/admin/appointments/index']), ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Доктора', Url::to(['/admin/doctors/index']), ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Диагнозы', Url::to(['/admin/diagnoses/index']), ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Специальности', Url::to(['/admin/specialty/index']), ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Пациенты', Url::to(['/admin/patients/index']), ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Корзина', Url::to(['/admin/basket/index']), ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Пользователи', Url::to(['/admin/users/index']), ['class' => 'btn btn-primary']) ?>

</div>
