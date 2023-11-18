<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\PatientsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'medical_card_number') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date_of_birth') ?>

    <?= $form->field($model, 'address') ?>

    <?php echo $form->field($model, 'gender') ?>

    <?php echo $form->field($model, 'discount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
