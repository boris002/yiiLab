<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Patients;
use app\modules\admin\models\Doctors;
use app\modules\admin\models\Diagnoses;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\Appointments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="appointments-form">

    <?php $form = ActiveForm::begin();
    echo $form->field($model, 'id_doctor')->dropDownList(Doctors::getDoctorList(), ['prompt' => 'Выберите доктора'])->label('Выберите доктора');
    echo $form->field($model, 'id_patient')->dropDownList(Patients::getPatientList(), ['prompt' => 'Выберите пациента'])->label('Выберите пациента');
    echo $form->field($model, 'visit_date')->textInput(['type'=>'date'])->label('Дата');
    echo $form->field($model, 'visit_purpose')->textInput(['maxlength' => true])->label('Цель визита');
    echo $form->field($model, 'visit_price')->textInput(['type' => 'number'])->label('Стоимость визита');
    echo $form->field($model, 'id_diagnose')->dropDownList(Diagnoses::getDiagnosesList(), ['prompt' => 'Выберите диагноз'])->label('Выберите диагноз');
?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
