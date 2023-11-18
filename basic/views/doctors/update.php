<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var array $model */
use app\models\specialty;

$this->title = 'Редактировать Доктора: ' . $model->name;
$specialtyList = Specialty::getSpecialtyList();



echo '<div class="patients-update">';
     echo '<h1>' . Html::encode($this->title) . '</h1>';
     $form = ActiveForm::begin();
     echo $form->field($model, 'name')->textInput(['maxlength' => true]);
     echo $form->field($model, 'id_specialty',)->dropDownList($specialtyList)->label('Выберите специальность');
     echo $form->field($model, 'category')->textInput(['type' => 'number','max' => 3, 'min' => 1]);


    echo '<div class="form-group">';
        echo Html::submitButton('Обновить', ['class' => 'btn btn-primary']);
    echo '</div>';

    ActiveForm::end();
echo '</div>';
?>