<?php
echo '<div class="row">';
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
echo Html::a('Врачи', Url::to(['doctors/table']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Пациенты', Url::to(['patients/table']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Диагнозы', Url::to(['diagnoses/table']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Визиты', Url::to(['appointments/table']), ['class' => 'btn btn-primary']);
echo ' ';
echo Html::a('Специальности', Url::to(['specialty/table']), ['class' => 'btn btn-primary']);
echo '</div>';
echo '</div>';

echo '<div class="col-md-6" style="padding:5px">';
echo Html::a('Добавить', Url::to(['appointments/create', /*'option' => 'patients'*/]), ['class' => 'btn btn-primary btn-block']);
echo '<br>';
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
    echo "<td>" . Html::a('Изменить', Url::to(['appointments/update', 'id' => $appointment->id]), ['class' => 'btn btn-info']) . "</td>";
    echo "<td>" . Html::a('Удалить', Url::to(['appointments/delete', 'id' => $appointment->id]), ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Вы уверены, что хотите удалить эту запись?', 'method' => 'post',],]) . "</td>";
    echo "</tr>";
}
echo "</tbody></table>";
echo '</div>';

