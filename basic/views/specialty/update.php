<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var array $model */

$this->title = 'Редактировать название специальности: ' . $model->name;


    echo '<div class="patients-update">';
    echo '<h1>' . Html::encode($this->title) . '</h1>';
    $form = ActiveForm::begin();
    echo $form->field($model, 'name')->textInput(['maxlength' => true]);
    echo '<div class="form-group">';
        echo Html::submitButton('Обновить', ['class' => 'btn btn-primary']);
    echo '</div>';

     ActiveForm::end();
echo '</div>';