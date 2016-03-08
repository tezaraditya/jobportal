<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Update Company : ' . ' ' . $model->company;

?>
<div class="company-update">

  <div class="col-lg-2"></div>
  <div class="col-lg-8">


    <div class="panel panel-primary well">
      <div class="panel-heading">
    <h3 align="center"><?= $this->title; ?></h3>
      </div>
      <div class="panel-body">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

  <div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
      'template' => '<div class="well"><div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7">{input}</div></div></div>',
  ]) ?></div>



  <div class="form-group">
      <?= Html::submitButton('Update', ['class' =>'btn btn-primary btn-lg btn-block']) ?>
  </div>


<?php ActiveForm::end(); ?>


</div>
</div>



</div>
</div>
