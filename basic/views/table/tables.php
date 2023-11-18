<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Patients;
use  app\models\Doctors;
/** @var string $option */
/** @var array $data */

use app\models\Diagnoses;
use yii\helpers\Url;
echo '<div class="row" style="margin-bottom: 20px;">';
echo '<div class="col-md-12">';
echo Html::a('Главная', Url::to(['table/index']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Врачи', Url::to(['table/tables', 'option' => 'doctors']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Пациенты', Url::to(['table/tables', 'option' => 'patients']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Диагнозы', Url::to(['table/tables', 'option' => 'diagnoses']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Визиты', Url::to(['table/tables', 'option' => 'appointments']), ['class' => 'btn btn-primary']);
echo '</div>';
echo '</div>';

echo '<div class="row">';

echo '<div class="col-md-6" style="padding:5px">';

if ($option === 'diagnoses') {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Название диагноза</th></tr></thead>";
    echo "<tbody>";

    foreach ($data as $diagnose) {
        echo "<tr>";
        echo "<td>{$diagnose->name}</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";

} elseif ($option === 'doctors') {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Имя врача</th><th>Специальность</th><th>Категория</th></tr></thead>";
    echo "<tbody>";

    foreach ($data as $doctor) {
        echo "<tr>";
        echo "<td>{$doctor->name}</td>";
        echo "<td>{$doctor->specialty->name}</td>";
        echo "<td>{$doctor->category}</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";

} elseif ($option === 'patients') {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Имя пациента</th><th>Имя пациента</th><th>Дата рождения</th><th>Адрес</th><th>Пол</th><th>Скидка</th></tr></thead>";
    echo "<tbody>";

    foreach ($data as $patient) {
        echo "<tr>";
        echo "<td>{$patient->medical_card_number}</td>";
        echo "<td>{$patient->name}</td>";
        echo "<td>{$patient->date_of_birth}</td>";
        echo "<td>{$patient->address}</td>";
        echo "<td>{$patient->gender}</td>";
        echo "<td>" . ($patient->discount * 100) . "%</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";

} elseif ($option === 'appointments') {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Доктор</th><th>Пациент</th><th>Дата визита</th><th>Цель визита</th><th>Стоимость визита</th><th>Диагноз</th></tr></thead>";
    echo "<tbody>";

    foreach ($data as $appointment) {
        echo "<tr>";
        echo "<td>{$appointment->doctor->name}</td>";
        echo "<td>{$appointment->patient->name}</td>";
        echo "<td>{$appointment->visit_date}</td>";
        echo "<td>{$appointment->visit_purpose}</td>";
        echo "<td>{$appointment->visit_price}</td>";
        echo "<td>{$appointment->diagnose->name}</td>";

        echo "</tr>";
    }

    echo "</tbody></table>";
}


