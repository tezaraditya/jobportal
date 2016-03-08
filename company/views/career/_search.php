<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CareerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="career-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="input-group">
       <?= $form->field($model, 'query')->textInput(['class'=>'form-control input-lg','placeholder'=>'Search...'])->label(false) ?>
       <span class="input-group-btn">
       <div class="help-block"></div>
       <?= Html::button('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default btn-lg','type'=>'submit']) ?>

       </span>
   </div>




    <?php ActiveForm::end(); ?>

</div>
