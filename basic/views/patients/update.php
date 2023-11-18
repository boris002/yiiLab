<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var array $model */

$this->title = 'Редактировать пациента: ' . $model->name;



echo '<div class="patients-update">';
    echo '<h1>' . Html::encode($this->title) . '</h1>';
    $form = ActiveForm::begin();
    echo $form->field($model, 'medical_card_number')->textInput(['type' => 'number']);
    echo $form->field($model, 'name')->textInput(['maxlength' => true]);
    echo $form->field($model, 'date_of_birth')->textInput(['type' => 'date']);
    echo $form->field($model, 'address')->textInput(['maxlength' => true]);
    echo $form->field($model, 'gender')->dropDownList(['Мужской' =>'Мужской','Женский'=>'Женский']);
    echo $form->field($model, 'discount')->textInput(['type' => 'number','max' => 100, 'min' => 0]);

    echo '<div class="form-group">';
        echo Html::submitButton('Обновить', ['class' => 'btn btn-primary']);
    echo '</div>';

    ActiveForm::end();
echo '</div>';
?>
