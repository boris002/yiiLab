<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<style>
    .btn {
        width: 450px;
        margin-bottom: 10px;
    }
</style>

<?php

echo '<h1>Выберите таблицу или запрос</h1>';

echo '<div class="row">';
echo '<div class="col-md-6">';
echo '<h3>Таблицы</h3>';

echo Html::a('Врачи', Url::to(['doctors/table']), ['class' => 'btn btn-primary btn-block']);
echo '<br>';
echo Html::a('Пациенты', Url::to(['patients/table']), ['class' => 'btn btn-primary btn-block']);
echo '<br>';
echo Html::a('Диагнозы', Url::to(['diagnoses/table']), ['class' => 'btn btn-primary btn-block']);
echo '<br>';
echo Html::a('Визиты', Url::to(['appointments/table']), ['class' => 'btn btn-primary btn-block']);
echo '<br>';
echo Html::a('Специальности', Url::to(['specialty/table']), ['class' => 'btn btn-primary btn-block']);

echo '</div>';
echo '<div class="col-md-6">';
echo '<h3>Запросы</h3>';

echo Html::a('Найти пациентов, рожденных в выбранный период', Url::to(['table/queries', 'option' => 'findPatientsByBirthYear']), ['class' => 'btn btn-secondary btn-block']);
echo '<br>';
echo Html::a('Узнать, к каким врачам на прием приходил введённый пациент', Url::to(['table/queries', 'option' => 'FindDoctorsByPatientName']), ['class' => 'btn btn-secondary btn-block']);
echo '<br>';
echo Html::a('Узнать, сколько приемов осуществил врач', Url::to(['table/queries', 'option' => 'CountAppointmentsByDoctor']), ['class' => 'btn btn-secondary btn-block']);
echo '<br>';
echo Html::a('Определить, какое количество приемов провел врач в текущем году', Url::to(['table/queries', 'option' => 'CountAppointmentsByDoctorInCurrentYear']), ['class' => 'btn btn-secondary btn-block']);
echo '<br>';
echo Html::a(' Подсчитать, какую сумма за посещение поликлиники потратили супруги', Url::to(['table/queries', 'option' => 'TotalCost']), ['class' => 'btn btn-secondary btn-block']);
echo '</div>';
echo '</div>';
?>
