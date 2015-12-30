<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Certification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'certification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publication_date')->widget(\yii\jui\DatePicker::classname(), [
       'dateFormat' => 'yyyy-MM-dd',
   	'clientOptions' => [
   			'changeMonth' => true,
   			'yearRange' => '1945:today',
   			'changeYear' => true,

   	],

   ])->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<span class="glyphicon glyphicon-floppy-disk"></span> Save') : Yii::t('app', '<span class="glyphicon glyphicon-edit"></span> Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-block btn-lg' : 'btn btn-info btn-block btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
