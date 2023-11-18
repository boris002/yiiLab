<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\specialty;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Doctors $model */
/** @var yii\widgets\ActiveForm $form */
$specialtyList = specialty::getSpecialtyList();

?>

<div class="doctors-form">

    <?php $form = ActiveForm::begin();
    echo $form->field($model, 'name')->textInput(['maxlength' => true])->label('ФИО');
    echo $form->field($model, 'id_specialty')->dropDownList($specialtyList, ['prompt' => 'Выберите специальность'])->label('Специальность');
    echo $form->field($model, 'category')->dropDownList(['1','2', '3'])->label('Категория');

    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
