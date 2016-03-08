<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Signup Company';

?>
<div class="company-create">

  <div class="col-lg-2"></div>
  <div class="col-lg-8">

    <?php if (Yii::$app->session->hasFlash('signupsuccess')): ?>


      <div class="alert alert-success">
            Terima Kasih Telah Bergabung, Silahkan Login Untuk Pasang Lowongan Kerja di Resumeditor.com..... Enjoy :).
        </div>



    <?php else: ?>

  <div class="panel panel-primary well">
    <div class="panel-heading">
  <h3 align="center"><?= $this->title; ?></h3>
    </div>
    <div class="panel-body">


      <?php $form = ActiveForm::begin(); ?>

      <div class="col-md-8"><?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?></div>

      <div class="col-md-4">  <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?></div>

      <div class="col-md-12"><?= $form->field($model, 'about')->textarea(['rows' => 6]) ?></div>

    <div class="col-md-12">  <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-4">  <?= $form->field($model, 'province')->dropDownList(ArrayHelper::map(\app\models\Location::find()->asArray()->all(), 'location', 'location'), ['prompt' => '-- Select Location --']) ?></div>

    <div class="col-md-5">  <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-3">  <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-6">  <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>

      <div class="col-md-6"> <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?></div>

      <div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
          'template' => '<div class="well"><div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7">{input}</div></div></div>',
      ]) ?></div>

      <div class="form-group col-md-12">
          <?= Html::submitButton('Sign Up', ['class' =>'btn btn-success btn-lg btn-block']) ?>
      </div>

      <?php ActiveForm::end(); ?>




</div>
</div>

	 <?php endif; ?>

</div>
</div>
