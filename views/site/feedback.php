<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;


$this->title = "Send Us Feedback";

 ?>



<?php if(Yii::$app->session->hasFlash('feedbacksuccess')): ?>

<div class="alert alert-success">

Send Feedback Success <span class="glyphicon glyphicon-thumbs-up"></span>

</div>


<?php else: ?>
 <div class="panel panel-primary well">
   <div class="panel-heading"><center><h1><?= $this->title; ?></h1></center></div>
   <div class="panel-body">


<?php $form = ActiveForm::begin(); ?>

<table class="table table-striped table-bordered">
  <tbody>


<tr><td><div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true,'placeholder'=> '*Insert Your Name']) ?></div></td></tr>
<tr><td><div class="col-md-6"><?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=> '*Insert Your Email'])  ?></div></td></tr>
<tr><td><div class="col-md-6"><?= $form->field($model, 'phone')->textInput(['maxlength' => true,'placeholder'=> '*Insert Your Number Phone'])  ?></div></td></tr>



</tbody>
</table>

<table class="table table-striped table-bordered">
  <tbody>

<tr><td><div class="col-md-12"><?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?></div></td></tr>
<tr><td><div class="col-md-12"><?= $form->field($model, 'feedback')->textArea(['rows' => 6]) ?></div></td></tr>

<tr><td><div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-4">{input}</div></div>',
]) ?></div></td></tr>

</tbody>
</table>



    <div class="col-md-12">  <?= Html::submitButton('Send Feedback', ['class' => 'btn btn-primary btn-block btn-lg']) ?></div>

<?php ActiveForm::end(); ?>


 </div>
 </div>


<?php endif; ?>
