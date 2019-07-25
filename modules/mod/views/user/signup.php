<?php
//use yii\bootstrap\Button;
use yii\bootstrap\ActiveForm;
use app\models\SignupForm;
use yii\helpers\Html;

$model = new SignupForm();
$this->title = 'Registration';
?>
<div class="row">
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h1>Sign Up</h1>
</div>
<div class="panel-body">
<?php $form = ActiveForm::begin(['id' => 'form-signup',
                'enableAjaxValidation' => true,
                'validationUrl' => ["user/ajax-sign-up"]
                ]); ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'surname')->textInput() ?>
<?= $form->field($model, 'username')->textInput() ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'password_repeat')->passwordInput() ?>
<div class="form-group">
<?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div>