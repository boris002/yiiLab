<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Doctors;
use app\models\Patients;

/* @var $model yii\base\Model */
/** @var string $option */

$form = ActiveForm::begin();

switch ($option) {
    case 'findPatientsByBirthYear':
        //echo $form->field($model, 'startYear',)->textInput(['type' => 'date']);
        //echo $form->field($model, 'endYear')->textInput(['type' => 'date']);
        echo $form->field($model, 'startYear')->textInput(['type' => 'number'])->label('Введите начальный год поиска');
        echo $form->field($model, 'endYear')->textInput(['type' => 'number'])->label('Введите конечный год поиска');
        break;
    case 'CountAppointmentsByDoctorInCurrentYear':
        echo $form->field($model, 'year',)->textInput(['type' => 'number'])->label('Введите год ');
        echo $form->field($model, 'doctorName')->dropDownList(Doctors::getDoctorList(), ['prompt' => 'Выберите доктора'])->label('Выберите доктора');
        break;
    case 'CountAppointmentsByDoctor':
    echo $form->field($model, 'doctorName')->dropDownList(Doctors::getDoctorList(), ['prompt' => 'Выберите доктора'])->label('Выберите доктора');

    //echo $form->field($model, 'doctorName')->label('Введите имя доктора');
    break;
    case 'FindDoctorsByPatientName':
        //echo $form->field($model, 'patientName')->label('Введите имя пациента');
        echo $form->field($model, 'patientName')->dropDownList(Patients::getPatientList(), ['prompt' => 'Выберите пациента'])->label('Выберите пациента');
        break;
    case 'TotalCost':
        echo $form->field($model, 'patient1Name')->dropDownList(Patients::getPatientList(), ['prompt' => 'Выберите пациента 1'])->label('Выберите пациента 1');
        //echo $form->field($model, 'patient1Name')->label('Введите имя пациента 1');
        echo $form->field($model, 'patient2Name')->dropDownList(Patients::getPatientList(), ['prompt' => 'Выберите пациента 2'])->label('Выберите пациента 2');
        //echo $form->field($model, 'patient2Name')->label('Введите имя пациента 2');
        break;
}

echo Html::submitButton('Поиск', ['class' => 'btn btn-primary']);
ActiveForm::end();
if ($model->errorMessage) {
    echo "<div class='alert alert-danger'>" . Html::encode($model->errorMessage) . "</div>";
}
if ($model->result) {
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    switch ($option) {
        case 'findPatientsByBirthYear':
            echo "<tr><th>Имя пациента</th><th>Год рождения</th></tr>";
            break;
        case 'FindDoctorsByPatientName':
            echo "<tr><th>Имя врача</th></tr>";
            break;
        case 'CountAppointmentsByDoctor':
            echo "<tr><th>Количество приемов</th></tr>";
            break;
        case 'CountAppointmentsByDoctorInCurrentYear':
            echo "<tr><th>Количество приёмов</th></tr>";
            break;
        case 'TotalCost':
            echo "<tr><th>Общая стоимость</th></tr>";
            break;

    }
    echo "</thead>";

    echo "<tbody>";
        if (is_array($model->result) || is_object($model->result)) {
            foreach ($model->result as $item) {
                echo "<tr>";
                switch ($option) {
                    case 'findPatientsByBirthYear':
                        echo "<td>" . Html::encode($item->name) . "</td>";
                        echo "<td>" . Html::encode($item->date_of_birth) . "</td>";
                        break;
                    case 'FindDoctorsByPatientName':
                        echo "<td>" . Html::encode($item->name) . "</td>";
                        break;
                }
                echo "</tr>";
            }
        } else {
            switch ($option) {
                case 'CountAppointmentsByDoctorInCurrentYear':
                    echo "<tr>";
                    echo "<td>" . $model->result . "</td>";
                    break;
                case 'CountAppointmentsByDoctor':
                echo "<tr>";
                echo "<td>" . $model->result . "</td>";
                echo "</tr>";
                break;
            case 'TotalCost':
                echo "<tr>";
                echo "<td>" . $model->result . "</td>";
                echo "</tr>";
                break;
        }
    }
    echo "</tbody></table>";

}
echo '<div class="row" style="margin-bottom: 20px;">';
echo '<div class="col-md-12">';
echo '<br>';
echo Html::a('Главная', Url::to(['table/index']), ['class' => 'btn btn-secondary btn-block']);
echo ' ';
echo Html::a('Запрос 1', Url::to(['table/queries', 'option' => 'findPatientsByBirthYear']), ['class' => 'btn btn-secondary btn-block']);
echo ' ';
echo Html::a('Запрос 2', Url::to(['table/queries', 'option' => 'FindDoctorsByPatientName']), ['class' => 'btn btn-secondary btn-block']);
echo ' ';
echo Html::a('Запрос 3', Url::to(['table/queries', 'option' => 'CountAppointmentsByDoctor']), ['class' => 'btn btn-secondary btn-block']);
echo ' ';
echo Html::a('Запрос 4', Url::to(['table/queries', 'option' => 'CountAppointmentsByDoctorInCurrentYear']), ['class' => 'btn btn-secondary btn-block']);
echo ' ';
echo Html::a('Запрос 5', Url::to(['table/queries', 'option' => 'TotalCost']), ['class' => 'btn btn-secondary btn-block']);
echo '</div>';
echo '</div>';
