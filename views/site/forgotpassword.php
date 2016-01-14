<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = "Forgot Password";


 ?>

 <div class="col-lg-3"></div>
<div class="col-lg-5">

<div class="panel panel-primary">
<div class="panel-heading "><b><?= $this->title; ?></b></div>
<div class="panel-body">

<?php $form = ActiveForm::begin(); ?>

<div class="col-md-12">
<?= $form->field($model,'email')->textInput() ?>
</div>

<div class="form-group col-md-12">
     <?= Html::submitButton('Retrieve Password', ['class' => 'btn btn-primary btn-block ']) ?>
 </div>

   <?php ActiveForm::end(); ?>
</div>
</div>
</div>

</div>
