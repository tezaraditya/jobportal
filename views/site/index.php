<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Situs Lowongan Kerja dan CV Online Terkini - '.Yii::$app->params['siteName'];

?>



<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide" src="<?= Yii::$app->homeUrl; ?>public/billboard.jpg" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <div style="font-size:46px;"><b>Selamat Datang di Resumeditor.com</b></div>
          <h2>Situs Lowongan Kerja dan CV Online</h2>
          <?= Html::a('<span class="glyphicon glyphicon-search"></span> Cari Lowongan Kerja',['career/index'],['class'=>'btn btn-info btn-lg']) ?>
          &nbsp;  &nbsp;
          <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Buat CV Online',['cv'],['class'=>'btn btn-success btn-lg']) ?>

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
