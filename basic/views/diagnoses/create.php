<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var array $model */


$this->title = 'Добавить диагноз';

$form = ActiveForm::begin();

echo '<h1>' . Html::encode($this->title) . '</h1>';
echo $form->field($model, 'name')->textInput(['maxlength' => true]);
echo '<div class="form-group">';
echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
echo '</div>';

ActiveForm::end();
?>