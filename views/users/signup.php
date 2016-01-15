
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\captcha\Captcha;

$this->title = "Sign Up";

/* @var $this yii\web\View */
/* @var $model app\models\Users */


?>

<?php if (Yii::$app->session->hasFlash('signupsuccess')): ?>


  <div class="alert alert-success">
        Terima Kasih Telah Bergabung, Silahkan Login Untuk Menggunakan ResumEditor..... Enjoy :).
    </div>



<?php else: ?>



<div class="col-lg-2"></div>
<div class="col-lg-8">

<div class="panel panel-primary ">
  <div class="panel-heading">
<h3 align="center"><?= $this->title; ?></h3>
  </div>
  <div class="panel-body">






    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-12">
    <?= $form->field($model, 'email')->input('email') ?> </div>
	<div class="col-md-12">
	 <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?></div>

	  <div class="col-md-12">
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?></div>



    <div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(
        \himiklab\yii2\recaptcha\ReCaptcha::className(),
        ['siteKey' => '6LchcBUTAAAAAPOjwnURVEkl-oLhcLALibIhazov','class'=>'required']
    ) ?></div>




    <div class="form-group col-md-12">
        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>









</div>
</div>
</div>



	 <?php endif; ?>
