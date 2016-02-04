<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model app\models\Career */

$this->title = $model->position.' at '.$model->company;

$applySuccessMessage = '<button type="button" class="btn btn-default btn-lg" disabled="disabled"><span class="glyphicon glyphicon-ok"></span> Apply Success</button>';

?>


<div class="col-md-4">
  <div class="well">  <center>
    <h1><?= Html::encode($model->position) ?></h1>
    <p>at <?= Html::encode($model->company) ?></p><hr/>


    <p>

<?php if (Yii::$app->session->hasFlash('sendCv_success')): ?>

<?= $applySuccessMessage; ?>

  <?php else: ?>

<?php
//query check data sendcv
$checkSendCV = \app\models\Sendcv::find()->where(['id_composite'=>$model->id_career.Yii::$app->user->id])->count();

?>


<?php
  //check data sendcv
   if($checkSendCV > 0) {
?>


<?= $applySuccessMessage; ?>

<?php
   } else  if(!Yii::$app->user->isGuest){

 ?>



      <div class="sendcv-form">

          <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($sendcvModel, 'id_career')->hiddenInput(['value'=>$model->id_career])->label(false) ?>

          <?= $form->field($sendcvModel, 'receiver_name')->hiddenInput(['maxlength' => true,'value'=>$model->company])->label(false) ?>

          <?= $form->field($sendcvModel, 'receiver_email')->hiddenInput(['maxlength' => true,'value'=>$model->email])->label(false) ?>

          <?= $form->field($sendcvModel, 'subject')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->user->identity->fullname.''.' Melamar Pekerjaan di Perusahaan Anda Melalui Resumeditor.com dengan Posisi '.''.$model->position])->label(false) ?>

          <?= $form->field($sendcvModel, 'id_user')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

          <?= $form->field($sendcvModel, 'id_composite')->hiddenInput(['value'=>$model->id_career.Yii::$app->user->identity->id])->label(false) ?>

          <div class="form-group">
              <?= Html::submitButton('Send Your CV', ['class' =>'btn btn-primary btn-lg']) ?>
          </div>

          <?php ActiveForm::end(); ?>

      </div>



      <?php } else if(Yii::$app->user->isGuest) { ?>

          <div class="alert alert-warning">Please <u><b><?= Html::a('Login',['site/login']) ?></b></u> to apply for this job</div>

        <?php } ?>

<?php endif; ?>


<div><?= \app\models\Sendcv::find()->where(['id_career'=>$model->id_career])->count(); ?> Applicants</div>


    </p>
  </center></div>
  <!-- List group -->
  <ul class="list-group">





  </ul>

</div>


<div class="col-md-8">


  <!-- Default panel contents -->
<table class="table table-striped table-bordered">
  <tbody>


<tr>
<td class="col-md-6"><span class="glyphicon glyphicon-map-marker"></span> <?= Html::encode($model->location) ?> </td>
<td class="col-md-6"><b>IDR</b> <?= $model->salary_min ?> - <?= $model->salary_max ?></td>
</tr>
<tr>
<td class="col-md-6"><span class="glyphicon glyphicon-education"></span> <?= Html::encode($model->education) ?></td>
<td class="col-md-6"><span class="glyphicon glyphicon-paperclip"></span> <?= Html::encode($model->function) ?></td>
</tr>
<tr>
<td class="col-md-6"><span class="glyphicon glyphicon-send"></span> <?= Html::encode($model->experience) ?></td>
<td class="col-md-6"><span class="glyphicon glyphicon-calendar"></span> <?= Html::encode(date('j F Y',strtotime($model->created_date))) ?></td>
</tr>
</tbody>
</table>



<div class="panel panel-default">
<div class="panel-heading"><h4>Requirements</h4></div>
<div class="panel-body"><?= Html::decode($model->requirements) ?></div>
</div>

<div class="panel panel-default">
<div class="panel-heading"><h4>Responsibilities</h4></div>
<div class="panel-body"><?= Html::decode($model->responsibilities) ?></div>
</div>



</div>
