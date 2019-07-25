<?php
use yii\bootstrap\ActiveForm;
use app\models\SigninForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

$model = new SigninForm;
$this->title = 'Authorization';
?>
<div class="row">
<div class="col-md-5">
<div class="panel panel-primary">
<div class="panel-heading">
<h1>Sign In</h1>
</div>
<?php Pjax::begin() ?>
<div class="panel-body">
<?php $form = ActiveForm::begin(['id' => 'signin-form',
                 'enableAjaxValidation' => true,
                 'validateOnSubmit' => true,
                 'validateOnChange' => false,
                 'validateOnBlur' => false,
                 'validationUrl' => ["user/ajax-sign-in"]
                 ]); ?>
<?= $form->field($model, 'username')->textInput() ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'rememberMe')->checkbox() ?>
Forgot your password? <?= Html::a('Reset', ['request-password-reset']) ?>
<p></p>
<div class="form-group">
<?= Html::submitButton('Sign In', ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
<?php Pjax::end() ?>
</div>
</div>
</div>