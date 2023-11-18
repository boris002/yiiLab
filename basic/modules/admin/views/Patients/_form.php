<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Patients $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patients-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'medical_card_number')->textInput()->label('Номер мед карты') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('ФИО') ?>

    <?= $form->field($model, 'date_of_birth')->textInput()->label('Дата рождения')->label('Дата рождения') ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Адрес') ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'Мужской' => 'Мужской', 'Женский' => 'Женский', ], ['prompt' => ''])->label('Пол') ?>

    <?= $form->field($model, 'discount')->textInput()->label('Скидка') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
