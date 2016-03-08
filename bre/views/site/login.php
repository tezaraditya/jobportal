<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Log In';

?>
<div class="col-lg-4"></div>
<div class="col-lg-4">
<div class="panel panel-primary ">
  <div class="panel-heading">
<h3 align="center"><?= $this->title; ?></h3>
  </div>
  <div class="panel-body">





    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],

    ]); ?>



       <div class="col-md-12"> <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username'])->label(false) ?> </div>

       <div class="col-md-12"> <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false) ?> </div>



        <div class=" col-md-13">
                <div class=" col-md-6">  <?= Html::submitButton('Log In', ['class' => 'btn btn-primary btn-block ', 'name' => 'login-button']) ?></div> <div class="col-md-6"> <?= $form->field($model, 'rememberMe')->checkbox() ?> </div>
        </div>

      

    <?php ActiveForm::end(); ?>



</div>
</div>
</div>
