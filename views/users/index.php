<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\captcha\Captcha;

$this->title = Yii::t('app', 'Personal Data');
?>


<div class="panel panel-primary ">
  <div class="panel-heading">
  Personal Data
  </div>
  <div class="panel-body">

<?php if (Yii::$app->session->hasFlash('savedata')): ?>


  <div class="alert alert-success">
        <h1><span class="glyphicon glyphicon-ok"></span> Data Has Been Saved</h1>
    </div>
<?php endif; ?>

<div class="users-form">




    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-12 alert alert-info">

    <div class="col-md-6"><?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?> </div>

   <div class="col-md-6"> <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?> </div>

   <div class="col-md-6"> <?= $form->field($model, 'birthdate')->widget(\yii\jui\DatePicker::classname(), [
    'dateFormat' => 'yyyy-MM-dd',
	'clientOptions' => [
			'changeMonth' => true,
			'yearRange' => '1945:2000',
			'changeYear' => true,

	],

])->textInput() ?> </div>

  <div class="col-md-6"> <?= $form->field($model, 'nationaly')->textInput() ?> </div>


	</div>

	<div class="col-md-12 alert alert-warning">

	<div class="col-md-6"> <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', ], ['prompt' => '-- Select --']) ?> </div>

   <div class="col-md-3"> <?= $form->field($model, 'height')->textInput() ?> </div>

   <div class="col-md-3"> <?= $form->field($model, 'weight')->textInput() ?> </div>

   <div class="col-md-6"> <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?> </div>

   <div class="col-md-6">  <?= $form->field($model, 'marital_status')->dropDownList([ 'single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced' ], ['prompt' => '-- Select --']) ?> </div>
</div>

   <div class="col-md-12 alert alert-success">
    <div class="col-md-8">  <?= $form->field($model, 'identity_address')->textInput() ?> </div>

    <div class="col-md-4"> <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?> </div>

    <div class="col-md-8">  <?= $form->field($model, 'domicile_address')->textInput() ?> </div>

    <div class="col-md-4"> <?= $form->field($model, 'domicile_postal_code')->textInput(['maxlength' => true]) ?> </div>
	<div class="col-md-12" style="color:red; font-style:italic">* Empty when <b>Domicile Address</b> is the same as the <b>Identity Address</b> </div>
	</div>

   <div class="col-md-12 alert alert-danger">







   <div class="col-md-6"> <?= $form->field($model, 'phone')->textInput() ?> </div>
    <div class="col-md-6"> <?= $form->field($model, 'email')->textInput() ?> </div>

</div>


<div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    'template' => '<div class="well"><div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7">{input}</div></div></div>',
]) ?></div>



 <div class="form-group col-md-12">
        <?= Html::submitButton(' <span class="glyphicon glyphicon-floppy-disk"></span> Save', ['class' =>'btn btn-primary btn-block btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>




 </div>
  </div>
