<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Career */

$this->title = $model->position.' at '.$model->company;

?>


<div class="col-md-4">
  <div class="well">  <center>
    <h1><?= Html::encode($model->position) ?></h1>
    <p>at <?= Html::encode($model->company) ?></p><hr/>
    <p><?= Html::a('Send Your CV','/',['class'=>'btn btn-primary btn-lg']) ?></p>
  </center></div>
  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item list-group-item-danger">  <center> Expired Date <h4><?= Html::encode(date('j F Y',strtotime($model->expired_date))) ?></h4></center></li>
    <li class="list-group-item list-group-item-success">     <center>Job Function<h4><span class="glyphicon glyphicon-paperclip"></span> <?= Html::encode($model->function) ?></h4>    </center></li>
    <li class="list-group-item list-group-item-warning">     <center>Experience <h4><span class="glyphicon glyphicon-send"></span>  <?= Html::encode($model->experience) ?> </h4>     </center></li>
    <li class="list-group-item list-group-item-info">     <center>Level<h4> <span class="glyphicon glyphicon-star"></span> <?= Html::encode($model->level) ?> </h4>     </center></li>

    <li class="list-group-item list-group-item-success">     <center>Salary Range ( IDR )<h4><?= number_format($model->salary_min,"0",",",".") ?> - <?= number_format($model->salary_max,"0",",",".") ?></h4></center></li>
    <li class="list-group-item list-group-item-info">     <center>Education <h4><span class="glyphicon glyphicon-education"></span> <?= Html::encode($model->education) ?> </h4>     </center></li>
    <li class="list-group-item list-group-item-info">     <center>Degree  <h4><span class="glyphicon glyphicon-education"></span> <?= Html::encode($model->degree) ?> </h4>     </center></li>
      <li class="list-group-item list-group-item-warning">     <center>Location<h4> <span class="glyphicon glyphicon-map-marker"></span> <?= Html::encode($model->location) ?> </h4>     </center></li>

  </ul>

</div>


<div class="col-md-8">


  <!-- Default panel contents -->


<div class="panel panel-default">
<div class="panel-heading"><h4>Requirements</h4></div>
<div class="panel-body"><?= Html::encode($model->requirements) ?></div>
</div>

<div class="panel panel-default">
<div class="panel-heading"><h4>Responsibilities</h4></div>
<div class="panel-body"><?= Html::encode($model->responsibilities) ?></div>
</div>

<p><?= Html::a(' Send Your CV','/',['class'=>'btn btn-primary btn-lg btn-block']) ?></p>


</div>
