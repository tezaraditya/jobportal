<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = "Forgot Password";


 ?>


 <?php if (Yii::$app->session->hasFlash('forgotpassword_success')): ?>

 <meta http-equiv="refresh" content="7;url=<?= Yii::$app->homeUrl; ?>"/>




   <div align="center">
       <h1><span class="glyphicon glyphicon-envelope"></span> </h1>
       <h1>Please Check Your Email !</h1>
       <h3> We sent an email with your password </h3>
       <img src="<?= Yii::$app->homeUrl; ?>/public/loading.GIF">

         <h4><?= Html::a('Click here if you browser does not automatically redirect you.',['/']); ?></h4>
     </div>




   <?php else: ?>



 <div class="col-lg-2"></div>
<div class="col-lg-7">

<div class="panel panel-primary">
<div class="panel-heading "><h3 align="center"><?= $this->title; ?></h3></div>
<div class="panel-body">

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-12">
<?= $form->field($model,'email')->textInput() ?>
</div>

<div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    'template' => '<div class="well"><div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7">{input}</div></div></div>',
]) ?></div>

<div class="form-group col-md-12">
     <?= Html::submitButton('Retrieve Password', ['class' => 'btn btn-primary btn-block ']) ?>
 </div>

   <?php ActiveForm::end(); ?>
</div>
</div>
</div>

</div>


<?php endif; ?>
