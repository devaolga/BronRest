<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Restaurants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'opening_time')->textInput() ?>

    <?= $form->field($model, 'closing_time')->textInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'cuisine')->textInput() ?>

    <?= $form->field($model, 'vegetarian')->textInput() ?>

    <?= $form->field($model, 'wifi')->textInput() ?>

    <?= $form->field($model, 'max_people')->textInput() ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 20000]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
