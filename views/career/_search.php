
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\CareerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="career-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="col-md-12"><?= $form->field($model, 'position')->textInput(['placeholder'=>'Position'])->label(false) ?></div>
    <div class="col-md-12">  <?= $form->field($model, 'function')->dropDownList(ArrayHelper::map(\app\models\JobFunction::find()->asArray()->all(), 'function', 'function'), ['prompt' => '-- All Job Function --'])->label(false) ?></div>
  <div class="col-md-12"> <?= $form->field($model, 'location')->dropDownList(ArrayHelper::map(\app\models\Career::find()->asArray()->all(), 'location', 'location'), ['prompt' => '-- All Location --'])->label(false) ?> </div>


    <div class="col-md-6">
      <?php echo $form->field($model, 'salary_min')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        'affixesStay' => true,
        'precision' => 0,
        'thousands' => ',',
        'allowNegative' => false,
    ]
])->label('Minimal Salary'); ?>

</div>

    <div class="col-md-6">
      <?php echo $form->field($model, 'salary_max')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        'affixesStay' => true,
        'precision' => 0,
        'thousands' => ',',
        'allowNegative' => false,
    ]
])->label('Maximal Salary'); ?></div>




    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'degree') ?>

    <?php // echo $form->field($model, 'requirements') ?>

    <?php // echo $form->field($model, 'responsibilities') ?>

    <div class="col-md-12">
        <?= Html::submitButton(Yii::t('app', '<span class="glyphicon glyphicon-search"></span> Search'), ['class' => 'btn btn-primary btn-block']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
