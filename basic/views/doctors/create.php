<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var array $model */
use app\models\specialty;


$this->title = 'Добавить пациента';
$specialtyList = Specialty::getSpecialtyList();

$form = ActiveForm::begin();

echo '<h1>' . Html::encode($this->title) . '</h1>';
echo $form->field($model, 'name')->textInput(['maxlength' => true]);
echo $form->field($model, 'id_specialty')->dropDownList($specialtyList, ['prompt' => 'Выберите специальность'])->label('Специальность');
echo $form->field($model, 'category')->dropDownList(['1','2', '3']);
//textInput(['type' => 'number','max' => 3, 'min' => 1]);

echo '<div class="form-group">';
echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
echo '</div>';

ActiveForm::end();
?>