<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Change Password';

?>


    <div class="col-lg-3"></div>
<div class="col-lg-5">

<div class="panel panel-primary">
  <div class="panel-heading "><b><?= $this->title; ?></b></div>
  <div class="panel-body">

   <?php $form = ActiveForm::begin(); ?>

  <div class="col-md-12">
  <?= $form->field($model,'password')->passwordInput(['value'=>'']) ?>
  </div>

  <div class="form-group col-md-12">
        <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary btn-block ']) ?>
    </div>

      <?php ActiveForm::end(); ?>
  </div>
  </div>
  </div>

  </div>
