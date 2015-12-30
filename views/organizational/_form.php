<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organizational */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizational-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <div class="col-md-12"><?= $form->field($model, 'organizational_name')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-12"><?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-12"><?= $form->field($model, 'responsibility')->textarea(['rows' => 6]) ?></div>

    <div class="col-md-6"><?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::classname(), [
       'dateFormat' => 'yyyy-MM-dd',
    'clientOptions' => [
        'changeMonth' => true,
        'yearRange' => '1945:today',
        'changeYear' => true,

    ],

   ])->textInput() ?></div>

    <div class="col-md-6"> <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::classname(), [
      'dateFormat' => 'yyyy-MM-dd',
    'clientOptions' => [
        'changeMonth' => true,
        'yearRange' => '1945:today',
        'changeYear' => true,

    ],

  ])->textInput() ?></div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<span class="glyphicon glyphicon-floppy-disk"></span> Save') : Yii::t('app', '<span class="glyphicon glyphicon-edit"></span> Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-block btn-lg' : 'btn btn-info btn-block btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
