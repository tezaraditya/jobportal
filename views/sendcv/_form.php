<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Sendcv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sendcv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_career')->dropDownList(ArrayHelper::map(\app\models\Career::find()->asArray()->all(), 'id_career', 'id_career'), ['prompt' => '-- Select --'])->label(false) ?>

    <?= $form->field($model, 'receiver_name')->dropDownList(ArrayHelper::map(\app\models\Career::find()->asArray()->all(), 'company', 'company'), ['prompt' => '-- Select --'])->label(false) ?>

    <?= $form->field($model, 'receiver_email')->dropDownList(ArrayHelper::map(\app\models\Career::find()->asArray()->all(), 'email', 'email'), ['prompt' => '-- Select --'])->label(false) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_user')->textInput(['value'=>Yii::$app->user->id]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
