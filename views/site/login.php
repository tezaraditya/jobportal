<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<div class="col-lg-3"></div>
<div class="col-lg-6">
<div class="panel panel-primary ">
  <div class="panel-heading">
  Login
  </div>
  <div class="panel-body">





    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],

    ]); ?>


  
       <div class="col-md-12"> <?= $form->field($model, 'email')->textInput(['placeholder'=>'Email'])->label(false) ?> </div>

       <div class="col-md-12"> <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false) ?> </div>

       <div class="col-md-12"> <?= $form->field($model, 'rememberMe')->checkbox() ?> </div>

        <div class=" col-md-13">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
        </div>

        

    <?php ActiveForm::end(); ?>



</div>
</div>
</div>
