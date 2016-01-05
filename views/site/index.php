<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::$app->params['siteName'];

?>



<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide" src="<?= Yii::$app->homeUrl; ?>public/careers.jpg" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1></h1>


        </div>
      </div>
    </div>
    <div class="item">
      <img class="second-slide" src="<?= Yii::$app->homeUrl; ?>public/careers2.jpg" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1></h1>


        </div>
      </div>
    </div>
    <div class="item">
      <img class="third-slide" src="<?= Yii::$app->homeUrl; ?>public/careers3.jpg" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <h1></h1>


        </div>
      </div>
    </div>
  </div>


</div><!-- /.carousel -->









    <?php

      $JobFunction = app\models\JobFunction::find()->orderBy('id_job_function')->all();

      foreach($JobFunction as $row) {

          echo "<div class='col-lg-2 style:height:30px;'><div class='well'>".Html::a($row->function,['career/index','CareerSearch[function]'=>$row->function])."</div></div>";


      }


     ?>
</br>
