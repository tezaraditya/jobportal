<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;


$this->title = 'Change Password';

?>

<?php if (Yii::$app->session->hasFlash('changepass_success')): ?>

<meta http-equiv="refresh" content="7;url=<?= Yii::$app->homeUrl; ?>"/>




  <div class="alert alert-success" align="center" style="font-size:30px">
      <img src="<?= Yii::$app->homeUrl; ?>/public/loading.GIF">  Change Password Success. <img src="<?= Yii::$app->homeUrl; ?>/public/loading.GIF">
    </div>

  <?php else: ?>

    <div class="col-lg-3"></div>
<div class="col-lg-7">

<div class="panel panel-primary">
  <div class="panel-heading "><b><?= $this->title; ?></b></div>
  <div class="panel-body">

   <?php $form = ActiveForm::begin(); ?>

  <div class="col-md-12">
  <?= $form->field($model,'password')->passwordInput(['value'=>''])->label('New Password') ?>
  </div>



  <div class="form-group col-md-12">
        <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary btn-block ']) ?>
    </div>

      <?php ActiveForm::end(); ?>
  </div>
  </div>
  </div>

  </div>
<?php endif; ?>
