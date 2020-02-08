<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Golongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="golongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_golongan')->textInput(['maxlength' => true, 'autofocus' => true,'placeholder' => 'Contoh : 3a, 4b, 3c, dsb.']) ?>

    <?= $form->field($model, 'pangkat')->textInput(['maxlength' => true, 'placeholder' => 'Contoh : Penata Muda']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
