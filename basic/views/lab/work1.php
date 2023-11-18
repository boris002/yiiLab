<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\DoctorsForm;
use app\models\patientsForm;
use app\models\DiagnosesForm;

$this->title = 'Лабораторная работа №1';

$selectedOption = Yii::$app->request->get('option','doctors');
$submittedData = null;

echo '<div class="row">';

echo '<div class="col-md-6" style="padding = 5px">';
if ($selectedOption === 'doctors') {
    $model = new DoctorsForm();
    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            $submittedData = $model;
            $model = new DoctorsForm();
        }
    }

    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

    echo $form->field($model, 'name')->textInput(['placeholder' => 'Фамилия И.О.']);
    echo $form->field($model, 'specialty')->textInput();
    echo $form->field($model, 'category')->dropDownList(['1' => '1', '2' => '2', '3' => '3']);
    echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']);

    ActiveForm::end();

} elseif ($selectedOption === 'Patients') {
    $model = new patientsForm();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            $submittedData = $model;
            $model = new patientsForm();
        }
    }

    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

    echo $form->field($model, 'name')->textInput(['placeholder' => 'Фамилия И.О.']);
    echo $form->field($model, 'medicalCardNumber')->textInput();
    echo $form->field($model, 'birthday')->textInput(['type' => 'date']);
    echo $form->field($model, 'gender')->dropDownList(['Мужской' => 'Мужской', 'Женский' => 'Женский']);
    echo $form->field($model, 'address')->textInput(['placeholder' => 'Адрес']);
    echo $form->field($model, 'discount')->textInput(['type' => 'number','max' =>100,'min'=>0]);
    echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']);

    ActiveForm::end();
} elseif ($selectedOption === 'DiagnosesForm') {
    $model = new DiagnosesForm();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            $submittedData = $model;
            $model = new DiagnosesForm();
        }
    }
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
    echo $form->field($model, 'name')->textInput(['placeholder' => 'Диагноз']);
    echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']);
    ActiveForm::end();
}


echo '</div>';
if ($submittedData !== null) {
    echo '<div class="col-md-6">';
    echo '<h3>Отправленные данные:</h3>';
    echo '<table class="table table-bordered">';
    echo '<tr><th>Поле</th><th>Значение</th></tr>';
    foreach ($submittedData->attributes as $attribute => $value) {
        echo '<tr><td>' . Html::encode($submittedData->getAttributeLabel($attribute)) . '</td><td>' . Html::encode($value) . '</td></tr>';
    }
    echo '</table>';

    echo '</div>';
}
echo '</div>';
echo '<div class="text-center">';
echo '<p>Выберите таблицу:</p>';
echo Html::a('DoctorsForm', ['lab/work1', 'option' => 'doctors'], ['class' => 'btn btn-primary']);
echo '&nbsp;&nbsp;';
echo Html::a('Patients', ['lab/work1', 'option' => 'Patients'], ['class' => 'btn btn-primary']);
echo '&nbsp;&nbsp;';
echo Html::a('DiagnosesForm', ['lab/work1', 'option' => 'DiagnosesForm'], ['class' => 'btn btn-primary']);
echo '</div>';
