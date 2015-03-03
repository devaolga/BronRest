<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>  
               <?= yii\authclient\widgets\AuthChoice::widget([
    			 'baseAuthUrl' => ['site/auth']				]) ?>      
                <?= $form->field($model, 'email'); ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'confirmpassword')->passwordInput() ?>
                <?= $form->field($model, 'name') ?>                
                <?= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'facebook')->hiddenInput()->label(''); ?> <!--/invisible fbcode field-->                
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
