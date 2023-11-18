<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var array $model */
use app\models\Patients;
use app\models\Doctors;
use app\models\Diagnoses;


$this->title = 'Добавить визит';


$form = ActiveForm::begin();

echo '<h1>' . Html::encode($this->title) . '</h1>';
echo $form->field($model, 'id_doctor')->dropDownList(Doctors::getDoctorList(), ['prompt' => 'Выберите доктора'])->label('Выберите доктора');
echo $form->field($model, 'id_patient')->dropDownList(Patients::getPatientList(), ['prompt' => 'Выберите пациента'])->label('Выберите пациента');
echo $form->field($model, 'visit_date')->textInput(['type'=>'date']);
echo $form->field($model, 'visit_purpose')->textInput(['maxlength' => true]);
echo $form->field($model, 'visit_price')->textInput(['type' => 'number']);
echo $form->field($model, 'id_diagnose')->dropDownList(Diagnoses::getDiagnosesList(), ['prompt' => 'Выберите диагноз'])->label('Выберите диагноз');

echo '<div class="form-group">';
echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
echo '</div>';

ActiveForm::end();
?>