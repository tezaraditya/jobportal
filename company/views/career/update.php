<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Career */

$this->title = 'Update : ' . ' ' . $model->position.' at '.$model->company;
$this->params['breadcrumbs'][] = ['label' => 'Careers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_career, 'url' => ['view', 'id' => $model->id_career]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="career-update">

  <div class="panel panel-primary">
  <div class="panel-heading"><h4><center><?= Html::encode($this->title) ?></center></h4></div>
  </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
