<?php
use yii\bootstrap\ActiveForm;
use app\models\SigninForm;
use yii\bootstrap\Html;

$model = new SigninForm();
?>


<div id="navigation" class="list-group">
    <a class="list-group-item" href="#navigation-32014" data-toggle="collapse" data-parent="#navigation"> Авторизация <b class="caret"></b></a>
    <div id="navigation-32014" class="submenu panel-collapse collapse">
        <a class="list-group-item">
            <?php $form = ActiveForm::begin([
                'id' => 'sideAuth-form',
                'enableAjaxValidation' => true,
                'validationUrl' => ["user/ajax-sign-in"]
            ]); ?>
            <?= $form->field($model, 'username')->textInput() ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <p></p>
            <div class="form-group">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary', 'name' => 'sideAuth-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </a>
        <a class="list-group-item" href="request-password-reset">
        Forgot password?
        </a>
    </div>
</div>