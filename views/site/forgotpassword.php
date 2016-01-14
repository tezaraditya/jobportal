<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = "Forgot Password";


 ?>

 <div class="col-lg-2"></div>
<div class="col-lg-8">

<div class="panel panel-primary">
<div class="panel-heading "><h3 align="center"><?= $this->title; ?></h3></div>
<div class="panel-body">

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-12">
<?= $form->field($model,'email')->textInput() ?>
</div>

<div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    'template' => '<div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7">{input}</div></div>',
]) ?></div>

<div class="form-group col-md-12">
     <?= Html::submitButton('Retrieve Password', ['class' => 'btn btn-primary btn-block ']) ?>
 </div>

   <?php ActiveForm::end(); ?>
</div>
</div>
</div>

</div>
