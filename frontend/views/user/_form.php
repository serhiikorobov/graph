<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['disabled' => 'disabled']) ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'role')->dropDownList(\frontend\models\User::getRoleOptions()) ?>
    <?= $form->field($model, 'status')->dropDownList(\frontend\models\User::getStatusOptions()) ?>
    <?= $form->field($model, 'new_password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
