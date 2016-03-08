<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobFunction */

$this->title = 'Update Job Function: ' . ' ' . $model->function;
$this->params['breadcrumbs'][] = ['label' => 'Job Functions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_job_function, 'url' => ['view', 'id' => $model->id_job_function]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-function-update">

  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
