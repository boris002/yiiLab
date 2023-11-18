<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\AppointmentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="appointments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>


    <?= $form->field($model, 'id_doctor') ?>

    <?= $form->field($model, 'id_patient') ?>

    <?= $form->field($model, 'visit_date') ?>

    <?= $form->field($model, 'visit_purpose') ?>

    <?php  echo $form->field($model, 'visit_price') ?>

    <?php  echo $form->field($model, 'id_diagnose') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
