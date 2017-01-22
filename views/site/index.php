<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Career;
$model = new app\models\CareerSearch;

$month_ID = array("","Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");


$this->title = Yii::$app->params['siteName'].' - Situs Lowongan Kerja '.$month_ID[date('n')].''.date(' Y');

?>



<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide billboard" alt="First slide">
      <div class="container">
        <div class="carousel-caption">




          <div class="career-search col-md-12">



              <?php $form = ActiveForm::begin([
                  'action' => ['/career/index'],
                  'method' => 'get',
              ]); ?>


              <div class="col-md-10">

			   <div class="input-group">
    <?= $form->field($model, 'position')->textInput(['class'=>'form-control input-lg','placeholder'=>'Cari Lowongan Kerja Disini...'])->label(false) ?>
	<span class="input-group-btn">
	<div class="help-block"></div>
    <?= Html::button('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default btn-lg','type'=>'submit']) ?>
    </span>


</div>

	</div>







			   <div class="col-md-2">
			   <div class="help-block"></div>
		  <?= Html::a('<button type="button" class="btn btn-primary btn-lg"><b><span class="glyphicon glyphicon-cloud-upload"></span> Buat Curriculum Vitae</b></button>',['/site/cv']) ?>

		  </div>


              <?php ActiveForm::end(); ?>

          </div>








        </div>

      </div>
    </div>


  </div>


</div><!-- /.carousel -->


<div class="container">
<div class="col-md-8">
  <h2 style="font-family:impact; color:#123456;">Latest Jobs</h2><hr/>





					    <?= GridView::widget([
    'dataProvider' => $LatestJobs,
    'showHeader' => false,
	'summary'=>'',
	'layout'=>'{items}',
    'columns' => [

        array(
            'format' => 'raw',
            'value'=>function ($data) {
                return Html::a(

                '<div class="row" >'
                .'<div class="col-md-11"><span class="glyphicon glyphicon-calendar"></span> '.date('j F Y',strtotime($data->created_date)).'<div style="font-size:2.4em">'.$data->position.'</div>'
                .'<div>'.$data->company.'</div>'

                .' <span class="glyphicon glyphicon-map-marker"></span> '.$data->location
                .' <span class="glyphicon glyphicon-option-vertical"></span> Experience : '.$data->experience
                .' <span class="glyphicon glyphicon-option-vertical"></span> Salary : '.'IDR '.$data->salary_min. ' - '.$data->salary_max
                .'</div></div>',

                        ['career/'.$data->id_career.'-'.$data->position]);
            },
        ),
    ],
]); ?>


</div>
<div class="col-md-3">

<h2 style="font-family:impact; color:#123456; text-align:center;">Follow Us</h2><hr/>
<div align="center" class="well">
<?= Html::a('<i class="fa fa-facebook"></i>','https://www.facebook.com/gudangjobcom',['target'=>'_blank','class'=>'btn btn-social-icon btn-lg btn-facebook']); ?>
&nbsp;
<?= Html::a('<i class="fa fa-twitter"></i>','https://www.twitter.com/gudangjobcom',['target'=>'_blank','class'=>'btn btn-social-icon btn-lg btn-twitter']); ?>
&nbsp;
<?= Html::a('<i class="fa fa-youtube"></i>','https://www.youtube.com/channel/UCbexi8Yb-avrJXw1Pxi9gfg',['target'=>'_blank','class'=>'btn btn-social-icon btn-lg btn-google']); ?>
&nbsp;
<?= Html::a('<i class="fa fa-instagram"></i>','https://www.instagram.com/gudangjobcom',['target'=>'_blank','class'=>'btn btn-social-icon btn-lg btn-instagram']); ?>

</div>


<h2 style="font-family:impact; color:#123456; text-align:center;">Job Function</h2><hr/>
<div align="center" class="well">

 <?= GridView::widget([
    'dataProvider' => $JobFunction,
    'showHeader' => false,
	'summary'=>'',
	'pager'=>[
		'firstPageLabel' => 'First',
		'lastPageLabel' => 'Last',
		'maxButtonCount'=>0,
		'prevPageLabel' =>'Prev',
		'nextPageLabel' =>'Next',
	],
    'columns' => [

        array(
            'format' => 'raw',
            'value'=>function ($data) {
                return Html::a('<div class="row"><div class="col-md-11"><b> '.$data->function.'</b></div></div>',['career/index','CareerSearch[function]'=>$data->function]);
            },
        ),
    ],
]); ?>

</div>

<h2 style="font-family:impact; color:#123456; text-align:center;">Location</h2><hr/>
<div align="center" class="well">

 <?= GridView::widget([
    'dataProvider' => $Location,
    'showHeader' => false,
	'summary'=>'',
	'pager'=>[
		'firstPageLabel' => 'First',
		'lastPageLabel' => 'Last',
		'maxButtonCount'=>0,
		'prevPageLabel' =>'Prev',
		'nextPageLabel' =>'Next',
	],
    'columns' => [

        array(
            'format' => 'raw',
            'value'=>function ($data) {
                return Html::a('<div class="row"><div class="col-md-11"><b> '.$data->location.'</b></div></div>',['career/index','CareerSearch[location]'=>$data->location]);
            },
        ),
    ],
]); ?>

</div>



</div>

</div>
