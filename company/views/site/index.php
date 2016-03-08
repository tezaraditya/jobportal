<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = Yii::$app->params['siteName'] ;

 ?>


<div class="well">

<center>

<h1>Selamat datang, <?= Yii::$app->user->identity->company ?></h1>
<hr/>

  <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Pasang Lowongan Kerja',['career/create'],['class'=>'btn btn-lg btn-warning']) ?>

  









</center>
</div>
