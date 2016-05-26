<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;

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

              <p class='col-md-10' style='font-size:200%; color:#ffffff; font-family:impact;' >Cari Lowongan Kerja Disini !</p>
			  
              <?php $form = ActiveForm::begin([
                  'action' => ['/career/index'],
                  'method' => 'get',
              ]); ?>


              <div class="col-md-10"><?= $form->field($model, 'position')->textInput(['placeholder'=>'Search Position ...','class'=>'form-control input-lg'])->label(false) ?></div>

             


              <div class="col-md-2">
                  <?= Html::submitButton(Yii::t('app', '<span class="glyphicon glyphicon-search"></span> Search'), ['class' => 'btn btn-primary btn-lg']) ?>

              </div>

              <?php ActiveForm::end(); ?>

          </div>






        </div>

      </div>
    </div>


  </div>


</div><!-- /.carousel -->


<div class="container">
<div class="panel">

  <!-- Nav tabs -->
  <ul class="nav nav-pills" role="tablist">
    <li role="presentation" class="active"><a href="#JobFunction" aria-controls="JobFunction" role="tab" data-toggle="tab"><h4><span class="glyphicon glyphicon-briefcase"></span> Job Function</h4></a></li>
    <li role="presentation"><a href="#Location" aria-controls="Location" role="tab" data-toggle="tab"><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4></a></li>

  </ul>
</div>
<div class="panel  panel-default">

<div class="panel-body">

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="JobFunction">

      <?php
      //list Job Function in Index
       $JobFunction = \app\models\JobFunction::find()->orderBy('id_job_function')->all();
       foreach($JobFunction as $row) {
           echo "<div class='col-lg-3 style:height:0px;'><div class='list-group'>"
           .Html::a('<button type="button" class="list-group-item"><b>'.$row->function.'</b></button>',['career/index','CareerSearch[function]'=>$row->function]).
          //" (".\app\models\Career::find()->where(['function'=>$row->function])->count().")".
           "</div></div>";
       }

    ?>

  </div>


    <div role="tabpanel" class="tab-pane" id="Location">

      <?php
      //list Location in Index
       $Location = app\models\Location::find()->orderBy('id_location')->all();
       foreach($Location as $row) {
           echo "<div class='col-lg-3 style:height:0px;'><div class='list-group'>"
           .Html::a('<button type="button" class="list-group-item"><b><span class="glyphicon glyphicon-map-marker"></span> '.$row->location.'</b></button>',['career/index','CareerSearch[location]'=>$row->location]).
           //" (".app\models\Career::find()->where(['location'=>$row->location])->count().")".
           "</div></div>";
       }

    ?>

    </div>



  </div>

</div>
</div>
</div>
