<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

date_default_timezone_set('Asia/Jakarta');

/* @var $this yii\web\View */
/* @var $model app\models\Career */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="career-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6"><?= $form->field($model, 'position')->textInput(['maxlength' => true])->label('* Position') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'company')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->company,'readOnly'=>true])->label('* Company') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'email')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->email])->label('* Corporate Email') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'location')->dropDownList(ArrayHelper::map(\app\models\Location::find()->asArray()->all(), 'location', 'location'), ['prompt' => '-- Select Location --'])->label('* Location') ?></div>

    <div class="col-md-6">  <?php echo $form->field($model, 'salary_min')->dropDownList(['1.000.000' =>'Rp 1.000.000','2.000.000'=>'Rp 2.000.000','3.000.000'=>'Rp 3.000.000','4.000.000'=>'Rp 4.000.000','5.000.000'=>'Rp 5.000.000'],['prompt' => 'Negotiable'])->label('Minimal Salary (Optional)') ; ?></div>

    <div class="col-md-6"><?php echo $form->field($model, 'salary_max')->dropDownList(['2.000.000' =>'Rp 2.000.000','3.000.000'=>'Rp 3.000.000','4.000.000'=>'Rp 4.000.000','5.000.000'=>'Rp 5.000.000','10.000.000'=>'Rp 10.000.000'],['prompt' => 'Negotiable'])->label('Maximum Salary (Optional)') ; ?></div>

    <div class="col-md-6"><?= $form->field($model, 'function')->dropDownList(ArrayHelper::map(\app\models\JobFunction::find()->asArray()->all(), 'function', 'function'), ['prompt' => '-- Select Job Function --'])->label('* Job Function') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'experience')->dropDownList(['Fresh Graduate' => 'Fresh Graduate','Less than 1 Years'=>'Less than 1 Years','1 Years'=>'1 Years','2 Years'=>'2 Years','3 Years'=>'3 Years','4 Years'=>'4 Years','5 Years'=>'5 Years','More than 5 Years'=>'More than 5 Years'],['prompt' => '-- Select Experience --'])->label('* Experience') ?></div>

    <div class="col-md-6"><?= $form->field($model, 'education')->dropDownList(['Semua Jenjang'=>'Semua Jenjang','SMA/SMK' =>'SMA/SMK','Diploma/D1/D2/D3' =>'Diploma/D1/D2/D3','Sarjana/S1'=>'Sarjana/S1','Pascasarjana/S2'=>'Pascasarjana/S2','Doktor/S3'=>'Doktor/S3'],['prompt'=>'-- Select Education --'])->label('* Education') ?></div>

      <div class="col-md-6"><?= $form->field($model, 'created_date')->textInput(['value'=>date("Y-m-d H:i:s"),'readOnly'=>true]) ?></div>

    <div class="col-md-12">

<?= $form->field($model, 'requirements')->widget(dosamigos\tinymce\TinyMce::className(), [
    'options' => ['rows' => 6],
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
])->label('* Requirements'); ?></div>

    <div class="col-md-12"><?= $form->field($model, 'responsibilities')->widget(dosamigos\tinymce\TinyMce::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ])->label('* Responsibilities');?></div>



    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-block' : 'btn btn-primary btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
